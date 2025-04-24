@extends('layouts.app')

@section('title', 'View Category')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <h4 class="fw-bold text-purple mb-0">
                <i class="bi bi-eye-fill me-2"></i> View Category Details
            </h4>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <input type="text" class="form-control" id="Description" value="{{ $category->description }}" disabled>
            </div>


            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Back to Categories List
                </a>
                <div>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning me-2">
                        <i class="bi bi-pencil-square"></i> Edit Category
                    </a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category? This will also remove associated books.')">
                            <i class="bi bi-trash"></i> Delete Category
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
