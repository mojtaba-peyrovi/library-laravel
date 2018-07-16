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
                            <option value="red" class="red-text">Red</option>
                            <option value="pink" class="pink-text">Pink</option>
                            <option value="purple" class="purple-text">Purple</option>
                            <option value="deep-purple" class="deep-purple-text">Deep-Purple</option>
                            <option value="indigo" class="indigo-text">Indigo</option>
                            <option value="blue" class="blue-text">blue</option>
                            <option value="light-blue" class="light-blue-text">light-blue</option>
                            <option value="cyan" class="cyan-text">cyan</option>
                            <option value="teal" class="teal-text">teal</option>
                            <option value="green" class="green-text">green</option>
                            <option value="light-green" class="light-green-text">light-green</option>
                            <option value="lime" class="lime-text">lime</option>
                            <option value="yellow" class="yellow-text">yellow</option>
                            <option value="amber" class="amber-text">amber</option>
                            <option value="orange" class="orange-text">orange</option>
                            <option value="deep-orange" class="deep-orange-text">deep-orange</option>
                            <option value="brown" class="brown-text">brown</option>
                            <option value="grey" class="grey-text">grey</option>
                            <option value="blue-grey" class="blue-grey-text">blue-grey</option>
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
