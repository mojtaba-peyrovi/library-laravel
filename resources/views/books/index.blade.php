@extends('layouts.master')
@section('title')
    Books
@endsection
@section('content')
    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-3">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Books</li>
    </ol>
    <div class="container m-4">

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
        @foreach ($books as $book)



                    <div class="col-md-2 mt-4">
                        <span class="badge {{ $book->type->color }}">{{ $book->type->title }}</span>
                        <div class="float-right">
                            <a href="#">
                                <span class="badge badge-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                            </a>
                            <a href="#">
                                <span class="badge badge-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                            </a>
                        </div>

                        <div class="mb-3">
                            <div class="view overlay">
                                <img class="z-depth-1-half" src="{{ $book->photo }}" alt="">
                                <a href="{{ $book->path() }}">
                                <div class="mask flex-center rgba-teal-strong">
                                <p class="white-text">Read More...</p>
                                </a>
                                </div>
                            </div>
                        </div>
                        <a href="/books/{{ $book->id }}">
                            {{ $book->title }}
                            ({{ $book->publish_year }})
                        </a>


                    </div>

        @endforeach
        </div>


    </div>
@endsection
