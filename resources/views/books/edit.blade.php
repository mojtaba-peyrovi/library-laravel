@extends('layouts.master')
@section('title')
    Edit:
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/books">Home</a></li>
        <li class="breadcrumb-item"><a href="/books">Books</a></li>
        <li class="breadcrumb-item"><a href="/books/{{ $book->id }}">{{ $book->title }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container mt-4">
        <div class="col-md-6 offset-md-3">
            <h2>Edit
                <strong>
                    "{{ $book->title }}"
                </strong>
            </h2>
            <hr>
            <form action="{{ action('booksController@update', $id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                  <label for="title">Title: </label>
                  <input type="text" class="form-control" name="title" value="{{ $book->title }}">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="author">Type: </label>
                      <select class="custom-select" name="type">
                          <option selected value="{{ $book->type->id }}">{{ $book->type->title }}</option>

                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="publish_year">Publish Year: </label>
                      <input type="text" class="form-control" name="publish_year" value="{{ $book->publish_year }}">
                    </div>
                </div>

                    <div class="form-group">
                      <label for="author">Author: </label>
                      <select class="custom-select" name="author">
                          <option selected value="{{ $book->author->id }}">{{ $book->author->id }}</option>

                      </select>
                    </div>

                <div class="form-group">
                  <label for="photo">Photo Link: </label>
                  <input type="text" class="form-control" name="photo" value="{{ $book->photo }}">
                  <img src="{{ $book->photo }}" alt="" class="img-thumbnail mt-3" style="width:150px;">
                </div>

                <div class="form-group">
                  <label for="desc">Description: </label>
                  <textarea name="desc" rows="8" cols="80" class="form-control">{{ $book->desc }}</textarea>
                </div>
                <button type="submit" name="button" class="btn btn-orange btn-sm">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Submit
                </button>
            </form>
        </div>


    </div>
@endsection
@section('scripts')

@endsection
