@extends('layouts.app')

@section('title', 'View Author')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <h4 class="fw-bold text-purple mb-0">
                <i class="bi bi-eye-fill me-2"></i> View Author Details
            </h4>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="books_count" class="form-label">Books Count</label>
                <input type="text" class="form-control" id="books_count" value="{{ $author->books_count }}" disabled>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Back to Authors List
                </a>
                <div>
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning me-2">
                        <i class="bi bi-pencil-square"></i> Edit Author
                    </a>
                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this author? This will also remove associated books.')">
                            <i class="bi bi-trash"></i> Delete Author
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
