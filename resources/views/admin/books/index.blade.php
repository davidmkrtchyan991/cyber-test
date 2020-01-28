@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-3 ">
            <div class="pull-right mr-4">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Publisher</th>
            <th scope="col">Release</th>
            <th scope="col">License</th>
            <th scope="col">Size</th>
            <th scope="col">Fontsize</th>
            <th scope="col">Wrapper</th>
            <th scope="col">Budget</th>
            <th scope="col">Avatar</th>
            <th scope="col">View</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->category->name }}</td>
                <td>{{ $book->publisher->name }}</td>
                <td>{{ $book->release }}</td>
                <td>{{ $book->license }}</td>
                <td>{{ $book->size }}</td>
                <td>{{ $book->font_size }}</td>
                <td>{{ $book->wrapper }}</td>
                <td>{{ $book->budget }}</td>
                <td><img src="{{ $book->avatar }}" style="width: 30px; height: 30px;" alt=""></td>
                <td>
                    <a href="{{ route('books.show',$book->id) }}">
                        <p data-placement="top" data-toggle="tooltip" title="View">
                            <button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal"
                                    data-target="#edit"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </p>
                    </a>
                </td>
                <td>
                    <a href="{{ route('books.edit',$book->id) }}">
                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                                    data-target="#edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        </p>
                    </a>
                </td>
                <td>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">{{ $books->links() }}</div>

@endsection
