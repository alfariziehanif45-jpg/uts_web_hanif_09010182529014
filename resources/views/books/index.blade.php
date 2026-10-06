@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Daftar Buku</h3>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Buku</a>
    </div>

    <form action="{{ route('books.index') }}" method="GET" class="card card-body border-0 shadow-sm mb-3">
        <div class="row g-2">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control"
                       placeholder="Cari judul atau penulis..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="category_id" class="form-select">
                    <option value="">-- Semua Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-outline-primary w-100">Cari</button>
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </div>
    </form>

    @if (request()->filled('search') || request()->filled('category_id'))
        <div class="alert alert-info py-2">
            Ditemukan <strong>{{ $books->total() }}</strong> buku
            @if (request()->filled('search'))
                dengan kata kunci "<strong>{{ request('search') }}</strong>"
            @endif
            @if (request()->filled('category_id'))
                di kategori "<strong>{{ $categories->firstWhere('id', request('category_id'))?->name }}</strong>"
            @endif
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th class="text-center">Stok</th>
                        <th class="text-center" style="width:220px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $books->firstItem() + $loop->index }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->year }}</td>
                            <td><span class="badge bg-secondary">{{ $book->category->name }}</span></td>
                            <td class="text-center">{{ $book->stock }}</td>
                            <td class="text-center">
                                <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">Data buku tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $books->links() }}
    </div>
@endsection