@extends('layouts.master')
@section('title')
    {{ $user->name }}
@endsection
@section('content')
    @include('front.partials.nav')
    <ol class="breadcrumb blue-grey lighten-5">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/users">Users</a></li>
        <li class="breadcrumb-item active">{{ $user->name }}</li>
    </ol>
    <div class="container mt-4">
        <!--Jumbotron-->
            <div class="jumbotron">
                <h1 class="h1-reponsive mb-3 blue-text"><strong class="text-white">
                    <i class="fa fa-user"></i>
                    {{ $user->name }}</strong></h1>
                <p class="lead text-white">
                    Here is your profile!
                </p>
                <hr class="my-4">
            </div>

        <!--Jumbotron-->

        <h6 class="text-indigo">Personal Info</h6>
        <hr>
        <div class="row">
            <div class="col-md-2">
                <img src="/img/empty-user.jpg" alt="" class="img-thumbnail" style="width:150px;height:150px;">
            </div>
            <div class="col-md-9">
                <strong>Name: </strong>
                {{ $user->name }}<br>
                <strong>Email: </strong>
                {{ $user->email }}
            </div>
        </div>
        @foreach ($user->books as $book)
            @if ($book->favorite == 1)
                <h6 class="text-indigo mt-4">{{ $user->name}}'s Favrorites:</h6>
                <hr>
                <div class="col-md-12 bg-grey-lighter mt-4 pt-3">
                    <div class="container">
                        <div class="row">
                            @foreach ($user->books as $book)
                            <div class="col-md-2 mt-4">
                                @include('flash::message')
                                <div class="mb-3">
                                    <div class="view overlay mb-2">
                                        <img class="z-depth-1-half" src="{{ $book->photo }}" alt="">
                                        <a href="/books/{{ $book->id }}">
                                        <div class="mask flex-center rgba-teal-strong">
                                        <p class="white-text">Read More...</p>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                @include('front.partials.rate-stars')
                                    <a href="/books/{{ $book->id }}" class="mt-2">
                                        <h6 class="font-bold font-small">
                                            {{ $book->title }}
                                        </h6>
                                        <small>({{ $book->publish_year }})</small>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @if ($user->books->count())

            <h6 class="text-indigo mt-4">Created by {{ $user->name }}</h6>
            <hr>
            <div class="col-md-12 bg-grey-lighter mt-4 pt-3">
                <div class="container">
                    <div class="row">
                        @foreach ($user->books as $book)
                        <div class="col-md-2 mt-4">
                            @include('flash::message')
                            <div class="mb-3">

                                    <div class="view overlay">
                                        <img class="z-depth-1-half" src="{{ $book->photo }}" alt="">
                                        <a href="/books/{{ $book->id }}">
                                        <div class="mask flex-center rgba-teal-strong">
                                        <p class="white-text">Read More...</p>
                                        </a>
                                        </div>
                                    </div>
                                    <a href="/books/{{ $book->id }}" class="mt-2">
                                        {{ $book->title }}
                                        ( {{ $book->publish_year }})
                                    </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif


    </div>


@endsection
