<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Author::create([
            'name' => request('name'),
            'last_name' => request('last_name'),
            'photo' => '/img/' . request('photo'),

            'desc' => request('desc')
        ]);

        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Author Added!')->success();
        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $related_books = $author->books;
        return view('authors.show', compact('author','related_books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);
         return view('authors.edit',compact('author','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $author->name = $request->get('name');
        $author->last_name = $request->get('last_name');
        $author->photo = $request->get('photo');
        $author->desc = $request->get('desc');
        $author->save();
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Changes Saved!')->success();

        return view('authors.show', ['author' => Author::find($id), 'related_books'=> $author->books]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();
        flash('<i class="fa fa-comment-o" aria-hidden="true"></i> Successfully Removed!')->success();
        return redirect('/authors');
    }


}
