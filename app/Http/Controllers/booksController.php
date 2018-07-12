<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Type;
use Illuminate\Http\Request;
use DB;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::with('author')->get();
        $authors = Author::all();
        $types = Type::all();
        return view('books.create',compact('authors','books','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        // $type = $request->input('type');
        // dd($type);
        // dd($request->input('type'));

        $book = Book::create([
            'title' => request('title'),
            'author_id' => $request->input('author'),
            'type_id' => $request->input('type'),
            'publisher_id' => 1,
            'publish_year' => request('publish_year'),
            'photo' => request('photo'),
            'desc' => request('desc')
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

}
