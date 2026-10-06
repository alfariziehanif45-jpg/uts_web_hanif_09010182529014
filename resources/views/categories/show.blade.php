@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
    <h3 class="mb-3">Detail Kategori</h3>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold">{{ $category->name }}</h5>
            <p class="text-muted mb-0">{{ $category->description ?: 'Tidak ada deskripsi.' }}</p>
        </div>
        <div class="card-footer bg-white">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <strong>Buku dalam kategori ini ({{ $books->total() }})</strong>
            <a href="{{ route('books.index', ['category_id' => $category->id]) }}"
               class="btn btn-sm btn-outline-primary">Lihat di Data Buku</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th class="text-center">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->year }}</td>
                            <td class="text-center">{{ $book->stock }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-3">Belum ada buku di kategori ini.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $books->links() }}
    </div>
@endsection