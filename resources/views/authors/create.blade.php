@extends('layouts.master')
@section('title')
    Add an Author
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/books">Home</a></li>
        <li class="breadcrumb-item"><a href="/authors">Authors</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container mt-4">
        <div class="col-md-6 offset-md-3">
            <h2>Create an Author</h2>
            <hr>
            <form class="" action="/authors" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="name">First Name: </label>
                  <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                  <label for="last_name">Last Name: </label>
                  <input type="text" class="form-control" name="last_name">
                </div>

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
        </div>


    </div>
@endsection
@section('scripts')

@endsection
