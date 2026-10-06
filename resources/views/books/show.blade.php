@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h3 class="mb-3">Detail Buku</h3>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-borderless mb-0">
                <tr><th style="width:200px">Judul</th><td>{{ $book->title }}</td></tr>
                <tr><th>Penulis</th><td>{{ $book->author }}</td></tr>
                <tr><th>Penerbit</th><td>{{ $book->publisher }}</td></tr>
                <tr><th>Tahun Terbit</th><td>{{ $book->year }}</td></tr>
                <tr><th>Stok</th><td>{{ $book->stock }}</td></tr>
                <tr>
                    <th>Kategori</th>
                    <td>
                        <a href="{{ route('categories.show', $book->category) }}"
                           class="badge bg-secondary text-decoration-none">{{ $book->category->name }}</a>
                        <div class="text-muted small mt-1">{{ $book->category->description }}</div>
                    </td>
                </tr>
                <tr><th>Dibuat</th><td>{{ $book->created_at->format('d M Y H:i') }}</td></tr>
                <tr><th>Terakhir Diubah</th><td>{{ $book->updated_at->format('d M Y H:i') }}</td></tr>
            </table>
        </div>
        <div class="card-footer bg-white">
            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection