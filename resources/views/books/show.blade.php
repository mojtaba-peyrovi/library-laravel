@extends('layouts.master')
@section('title')
    {{ $book->title }}
@endsection
@section('content')
    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="/books">Books</a></li>
        <li class="breadcrumb-item active">
            {{ $book->title }}
        </li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $book->photo }}" alt="">
            </div>
            <div class="col-md-6 bg-grey-lighter">
                <h1>
                    {{ $book->title }}
                    <span>
                        ({{ $book->publish_year }})
                    </span>
                </h1>
                <p>
                    by <a href="/authors/{{ $book->author->id }}">
                        {{ $book->author->name }}
                        {{ $book->author->last_name }},
                        (Author)
                        </a>
                </p>
                <span class="badge {{ $book->type->color }}">
                    {{ $book->type->title }}
                </span>
                <a href="" class="btn btn-sm btn-red float-right">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    Delete
                </a>
                <a href="/books/{{ $book->id }}/edit" class="btn btn-sm btn-orange float-right">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit
                </a>

                <hr>
                <p>{{ $book->desc }}</p>
            </div>
        </div>
    </div>
@endsection
