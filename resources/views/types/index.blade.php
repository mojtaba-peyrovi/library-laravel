@extends('layouts.master')
@section('title')
    Books
@endsection
@section('content')
    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Books</li>
    </ol>
    <div class="container mt-4">

            <!--Jumbotron-->
                <div class="jumbotron mt-4">
                    <h1 class="h1-reponsive mb-3 blue-text"><strong class="text-white">
                        <i class="fa fa-book"></i>
                        Books</strong></h1>
                    <p class="lead text-white">
                        Find books you like here.
                    </p>
                    <hr class="my-4">
                    <!-- category badges -->
                    <span class="badge badge-pill pink">Default</span>
                    <span class="badge badge-pill light-blue">Primary</span>
                    <span class="badge badge-pill indigo">Success</span>
                    <span class="badge badge-pill purple">Info</span>
                    <span class="badge badge-pill orange">Warning</span>
                    <span class="badge badge-pill green">Danger</span>
                </div>
            <!--Jumbotron-->
        <div class="row">
        @foreach ($types as $type)
                    <div class="col-md-2 mt-4">

                    </div>
        @endforeach
            <div class="col-md-8 offset-md-2">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Color</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($types as $type)
                        <tr>
                          <th scope="row">{{ $type->id }}</th>
                          <td>{{ $type->title }}</td>
                          <td>
                              <span class="badge {{ $type->color }}">
                                  {{ $type->title }}
                              </span>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
