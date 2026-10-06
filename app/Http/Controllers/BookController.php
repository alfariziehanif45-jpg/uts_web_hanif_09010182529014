<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /** Daftar buku + BONUS: pencarian (judul/penulis) & filter kategori */
    public function index(Request $request): View
    {
        $books = Book::with('category')
            // Pencarian berdasarkan judul ATAU penulis
            ->when($request->filled('search'), function ($query) use ($request) {
                $keyword = trim($request->search);

                $query->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                      ->orWhere('author', 'like', "%{$keyword}%");
                });
            })
            // Filter berdasarkan kategori
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // supaya filter tetap aktif saat pindah halaman

        return view('books.index', [
            'books'      => $books,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('books.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Book::create($this->validated($request));

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book): View
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book'       => $book,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $book->update($this->validated($request));

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title'       => ['required', 'string', 'max:255'],
            'author'      => ['required', 'string', 'max:255'],
            'publisher'   => ['required', 'string', 'max:255'],
            'year'        => ['required', 'integer', 'min:1000', 'max:' . date('Y')],
            'stock'       => ['required', 'integer', 'min:0'],
        ], [
            'category_id.required' => 'Kategori wajib dipilih.',
            'title.required'       => 'Judul wajib diisi.',
            'author.required'      => 'Penulis wajib diisi.',
            'publisher.required'   => 'Penerbit wajib diisi.',
            'year.required'        => 'Tahun terbit wajib diisi.',
            'year.max'             => 'Tahun terbit tidak boleh melebihi tahun ini.',
            'stock.required'       => 'Stok wajib diisi.',
        ]);
    }
}