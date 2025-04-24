@extends('layouts.app')

@section('title', 'Categories Listing')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-purple"> Categories Listing</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-purple rounded-pill shadow-sm">
            <i class="bi bi-plus-circle"></i> Add New Category
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr class="shadow-sm">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-outline-info rounded-circle">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-warning rounded-circle">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No categories found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
