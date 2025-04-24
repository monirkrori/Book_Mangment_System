@extends('layouts.app')

@section('title', 'Authors Listing')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-purple"> Authors Listing</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-purple rounded-pill shadow-sm">
            <i class="bi bi-plus-circle"></i> Add New Author
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Books Count</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($authors as $author)
                        <tr class="align-middle">
                            <td>{{ $author->id }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->books_count }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('authors.show', $author->id) }}" class="btn btn-sm btn-outline-info rounded-circle">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-outline-warning rounded-circle">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="4" class="text-center text-muted">No authors found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
