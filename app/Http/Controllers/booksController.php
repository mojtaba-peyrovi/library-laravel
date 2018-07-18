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
        // $format = request('format');
        // dd($format);
        $book = Book::create([
            'title' => request('title'),
            'author_id' => $request->input('author'),
            'type_id' => $request->input('type'),
            'publisher_id' => 1,
            'publish_year' => request('publish_year'),
            'format' => request('format'),
            'photo' => $request->input('photo'),
            'desc' => request('desc')
        ]);
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Book Added!')->success();

        return redirect('/books');
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
    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::all();
        $types = Type::all();
         return view('books.edit',compact('book','id','types','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $book = Book::create([
        //     'title' => request('title'),
        //     'author_id' => $request->input('author'),
        //     'type_id' => $request->input('type'),
        //     'publisher_id' => 1,
        //     'publish_year' => request('publish_year'),
        //     'photo' => request('photo'),
        //     'desc' => request('desc')
        // ]);
        $book = Book::find($id);
        $book->title = $request->get('title');
        $book->author_id = $request->get('author');
        $book->type_id = $request->get('type');
        $book->publish_year = $request->get('publish_year');
        $book->photo = $request->get('photo');
        $book->desc = $request->get('desc');
        $book->save();

        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Changes Saved!')->success();

        // return view('books.show', ['book' => Book::find($id)]);
        // return redirect('/books/{book}');
        return redirect()->route('books.show',[$book]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Successfully Removed!')->success();
        return redirect('/books');
    }

}
