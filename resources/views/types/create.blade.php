@extends('layouts.master')
@section('title')
    Add a type
@endsection
@section('content')

    @section('stylesheets')

    @endsection

    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/types">Types</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
    <div class="container mt-4">
        <div class="col-md-6 offset-md-3">
            <h2>Create a type (Genre)</h2>
            <hr>
            <form class="" action="/types" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="title">Title: </label>
                  <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                  <label for="color">Color: </label>
                  <select class="custom-select" name="color">
                      <option selected>Available Colors</option>
                            @include('front.partials.type-color-options')
                  </select>
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
