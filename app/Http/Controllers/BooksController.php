<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Publisher;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('author')
            ->with('category')
            ->with('publisher')
            ->paginate(10);
        return view('admin.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('admin.books.create', compact('authors', 'categories', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'release' => 'required',
            'license' => 'required',
            'size' => 'required',
            'font_size' => 'required',
            'wrapper' => 'required',
            'budget' => 'required',
            'avatar' => 'required',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success','Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book = Book::where('id', $book->id)
            ->with('author')
            ->with('category')
            ->with('publisher')
            ->first();
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('admin.books.edit', compact('book', 'authors', 'categories', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'release' => 'required',
            'license' => 'required',
            'size' => 'required',
            'font_size' => 'required',
            'wrapper' => 'required',
            'budget' => 'required',
            'avatar' => 'required',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
