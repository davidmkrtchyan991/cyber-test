@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Book</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.update',$book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $book->name }}" class="form-control"
                               placeholder="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author:</strong>
                        <select name="author_id">
                            @foreach ($authors as $value)
                                <option value="{{ $value->id }}"
                                        @if ($value->id == old('author', $book->author->id))
                                        selected="selected"
                                    @endif
                                >{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Category:</strong>
                        <select name="category_id">
                            @foreach ($categories as $value)
                                <option value="{{ $value->id }}"
                                        @if ($value->id == old('author', $book->category->id))
                                        selected="selected"
                                    @endif
                                >{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Publisher:</strong>
                        <select name="publisher_id">
                            @foreach ($publishers as $value)
                                <option value="{{ $value->id }}"
                                        @if ($value->id == old('author', $book->publisher->id))
                                        selected="selected"
                                    @endif
                                >{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Release:</strong>
                        <input type="text" name="release" value="{{ $book->release }}" class="form-control"
                               placeholder="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>License:</strong>
                        <input type="text" name="license" value="{{ $book->license }}" class="form-control"
                               placeholder="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Size:</strong>
                        <input type="text" name="size" value="{{ $book->size }}" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fontsize:</strong>
                        <input type="text" name="font_size" value="{{ $book->font_size }}" class="form-control"
                               placeholder="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Wrapper:</strong>
                        <input type="text" name="wrapper" value="{{ $book->wrapper }}" class="form-control"
                               placeholder="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Budget:</strong>
                        <input type="text" name="budget" value="{{ $book->budget }}" class="form-control"
                               placeholder="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Avatar:</strong>
                        <input type="text" name="avatar" value="{{ $book->avatar }}" class="form-control"
                               placeholder="">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
