@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
    <h3 class="mb-3">Edit Kategori</h3>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                @include('categories._form')

                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection