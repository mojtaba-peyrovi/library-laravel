@extends('layouts.master')
@section('title')
    Add a Book
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-3">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/">Books</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container mt-4">
        <div class="col-md-6 offset-md-3">
            <h2>Create a Book</h2>
            <hr>
            <form class="" action="/books" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="title">Title: </label>
                  <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                  <label for="author">Type: </label>
                  <select class="custom-select">
                      <option selected>types</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" name="author">{{ $type->title }}</option>
                        @endforeach
                  </select>
                </div>
                
                <a href="#" class="btn btn-outline-warning">New Type</a>

                    <div class="form-group">
                      <label for="author">Author: </label>
                      <select class="custom-select">
                          <option selected>Pick an author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" name="author">{{ $author->fullName() }}</option>
                            @endforeach
                      </select>
                    </div>

                        <a href="#" class="btn btn-outline-warning">New Author</a>


                <div class="form-group">
                  <label for="photo">Photo Link: </label>
                  <input type="text" class="form-control" name="photo">
                </div>
                <div class="form-group">
                  <label for="desc">Description: </label>
                  <textarea name="desc" rows="8" cols="80" class="form-control"></textarea>
                </div>
                <button type="submit" name="button" class="btn btn-indigo">Create</button>
            </form>
        </div>


    </div>
@endsection
@section('scripts')

@endsection
