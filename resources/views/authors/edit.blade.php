@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom-0">
            <h4 class="fw-bold text-purple mb-0">
                <i class="bi bi-pencil-square me-2"></i> Edit Author
            </h4>
        </div>

        <div class="card-body">
            <form action="{{ route('authors.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label required-field">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $author->name) }}" placeholder="Enter author's name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-purple">
                        <i class="bi bi-save"></i> Update Author
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
