@extends('layouts.master')
@section('title')
    {{ $author->fullName() }}
@endsection
@section('content')
    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="/authors">Authors</a></li>
        <li class="breadcrumb-item active">
            {{ $author->fullName() }}
        </li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                  <img src="{{ $author->photo }}" alt="" class="img-thumbnail shadow-md" style="width:65%; height:auto;">

            </div>
            <div class="col-md-6 bg-grey-lighter">

                    <h1>
                        {{ $author->fullName() }} <span><small>(Author)</small></span>
                    </h1>

                <hr>
                <p class="mb-3">{{ $author->desc }}</p>
            </div>

            <div class="col-md-10 bg-grey-lighter mt-4">
                <h2>All {{ $author->name }}'s Books:</h2>
                <hr>
                <div class="row">
                @foreach ($related_books as $book)
                <div class="col-md-2 mt-4">
                    <div class="mb-3">

                            <div class="view overlay">
                                <img class="z-depth-1-half" src="{{ $book->photo }}" alt="">
                                <a href="/books/{{ $book->id }}">
                                <div class="mask flex-center rgba-teal-strong">
                                <p class="white-text">Read More...</p>
                                </a>
                                </div>
                            </div>

                    </div>
                </div>
                @endforeach
            </div>


            </div>
        </div>
    </div>
@endsection
