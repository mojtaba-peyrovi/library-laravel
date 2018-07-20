@extends('layouts.master')
@section('title')
    Add a Book
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/books">Home</a></li>
        <li class="breadcrumb-item"><a href="/books">Books</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container mt-4">
        <div class="col-md-6 offset-md-3">
            <h2>Create a Book</h2>
            <hr>
            <form class="" action="/books" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                          <label for="title">Title: </label>
                          <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="format">Format: </label>
                        <select class="custom-select" name="format">
                            <option selected>Formats</option>
                                  <option value="Ebook">Ebook</option>
                                  <option value="Book">Book</option>
                                  <option value="Audio">Audio</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                      <label for="author">Type: </label>
                      <select class="custom-select" name="type">
                          <option selected>types</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->title }}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="publish_year">Publish Year: </label>
                      <input type="text" class="form-control" name="publish_year">
                    </div>
                </div>


                <a href="/type/create" class="btn btn-orange btn-sm" target="_blank">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                     New Type
                </a>

                    <div class="form-group">
                      <label for="author">Author: </label>
                      <select class="custom-select" name="author">
                          <option selected>Pick an author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->fullName() }}</option>
                            @endforeach
                      </select>
                    </div>

                <a href="/author/create" class="btn btn-orange btn-sm" target="_blank">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    New Author
                </a>


                <div class="form-group">
                  <label for="photo">Photo Link: </label>
                  <input type="text" class="form-control" name="photo">
                </div>
                <div class="form-group">
                  <label for="desc">Description: </label>
                  <textarea name="desc" rows="8" cols="80" class="form-control"></textarea>
                </div>
                <button type="submit" name="button" class="btn btn-indigo btn-sm">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Add
                </button>
            </form>

            <h2 class="mt-5">Add Books in Bulk</h2>
            <hr>

            <form method="post" action="/books/create/bulk" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="upload-file">Upload</label>
                <input type="file" name="upload-file" class="form-control">
              </div>
              <input type="submit" name="submit" value="Upload" class="btn btn-indigo btn-sm">
            </form>



        </div>


    </div>
@endsection
@section('scripts')

@endsection
