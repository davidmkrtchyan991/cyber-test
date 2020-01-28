@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">

                            @foreach($books as $book)
                                <div class="card col-md-6">
                                    <img class="card-img-top" src="{{$book->avatar}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$book->name}}</h5>
                                        <p class="card-text">{{$book->author->name}} {{$book->release}}</p>
                                        <p class="card-text">{{$book->publisher->name}} {{$book->category}}</p>
                                        <a href="#" class="btn btn-primary">Buy</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
