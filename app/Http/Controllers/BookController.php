<?php

namespace App\Http\Controllers;

use App\Http\Requests\book\StoreBookRequest;
use App\Http\Requests\book\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::with(['author', 'category']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id)->get();
        }

        if ($request->filled('author_id')) {
            $query->where('author_id', $request->author_id);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        $books = $query->paginate(10);
        $categories = Category::all();
        $authors = Author::all();

        return view('books.index', compact('books', 'categories', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('books.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        try {
            Book::create($request->validated());
            return redirect()->route('books.index')->with('success', 'Book created successfully');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error creating book: '.$e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('books.edit', compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return redirect()->route('books.index')->with('success', 'Book updated successfully');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }

    public function viewCount()
    {
        $authorsCount = Author::count();
        $booksCount = Book::count();
        $categoriesCount = Category::count();

        return view('welcome', compact('authorsCount', 'booksCount', 'categoriesCount'));
    }
}
