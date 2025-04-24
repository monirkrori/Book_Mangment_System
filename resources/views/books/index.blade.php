@extends('layouts.app')

@section('title', 'Book Listing')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-purple">📚 Book Listing</h1>
        <a href="{{ route('books.create') }}" class="btn btn-purple rounded-pill shadow-sm">
            <i class="bi bi-plus-circle"></i> Add New Book
        </a>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('books.index') }}" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Search by title</label>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="e.g. Harry Potter">
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Category</label>
                    <select name="category_id" class="form-select">
                        <option value="">All Categories</option> <!-- تم التعديل هنا -->
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Author</label>
                    <select name="author_id" class="form-select">
                        <option value="">All Authors</option> <!-- تم التعديل هنا -->
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-outline-purple rounded-pill">
                        <i class="bi bi-filter"></i> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive shadow-sm">
        <table class="table table-hover align-middle">
            <thead class="table-light text-center">
            <tr class="text-purple">
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($books as $book)
                <tr>
                    <td class="text-center">{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>
                        <span class="badge bg-purple text-white">{{ $book->category->name }}</span>
                    </td>
                    <td>{{ $book->author->name }}</td>
                    <td>${{ number_format($book->price, 2) }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-info rounded-circle">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-warning rounded-circle">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                    <td colspan="7" class="text-center text-muted">No books found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
