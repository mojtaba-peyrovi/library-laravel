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
                    <div class="d-flex justify-content-end">

                        <form method="get" action="/authors/{{ $author->id}}/edit">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                EDIT
                            </button>
                        </form>
                        <form class="pull-right" action="{{ action('booksController@destroy', $author->id) }}" method="post">
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
                <p class="mb-3">{{ $author->desc }}</p>
            </div>



        </div>
    </div>
@endsection
