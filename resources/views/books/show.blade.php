@extends('layouts.app')

@section('title', 'View Book')

@section('content')
    <div class="card">
        <div class="card-header bg-white border-bottom-0">
            <h4 class="fw-bold mb-0 text-purple">
                <i class="bi bi-eye-fill me-2"></i> View Book
            </h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" disabled>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" value="{{ $book->author->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" value="{{ $book->category->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" disabled>{{ $book->description }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="text" class="form-control" id="price" value="${{ number_format($book->price, 2) }}" disabled>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" value="{{ $book->quantity }}" disabled>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
            </div>
        </div>
    </div>
@endsection
