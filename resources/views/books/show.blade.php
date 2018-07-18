@extends('layouts.master')
@section('title')
    {{ $book->title }}
@endsection
@section('content')
    header('Location: http://www.example.com/')
    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="/books">Books</a></li>
        <li class="breadcrumb-item active">
            {{ $book->title }}
        </li>
    </ol>
    <div class="container">

            @include('flash::message')

        <div class="row">
            <div class="col-md-4">
                <img src="{{ $book->photo }}" alt="">
            </div>
            <div class="col-md-6 bg-grey-lighter">
                <h1>
                    @include('front.partials.format-badges')
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
                        -
                        Publisher:
                        <a href="#">
                            "Live Oak Media"
                        </a>

                </p>
                <span class="badge {{ $book->type['color'] }}">
                    {{ $book->type['title'] }}
                </span>

                <div class="d-flex justify-content-end">

                    <form method="get" action="/books/{{ $book->id}}/edit">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            EDIT
                        </button>
                    </form>
                    <form class="pull-right" action="{{ action('booksController@destroy', $book->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">

                        <button class="btn btn-sm btn-danger" data-toggle="confirmation"
                                data-btn-ok-label="Continue" data-btn-ok-class="btn-success"
                                data-btn-ok-icon-class="" data-btn-ok-icon-content=""
                                data-btn-cancel-label="" data-btn-cancel-class="btn-danger"
                                data-btn-cancel-icon-class="" data-btn-cancel-icon-content="close"
                                data-title="Are You Sure?" data-content="You will lose this book forever!">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                DELETE
                        </button>
                    </form>
                </div>


                <hr>
                <p>{{ $book->desc }}</p>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
    $('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    // other options
    });
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(1500).fadeOut(550);
    </script>
@endsection
