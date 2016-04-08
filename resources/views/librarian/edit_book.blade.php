@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Book</strong>
                </div>

                <div class="panel-body">
                    <!-- display errors -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('edit_book_submit', ['book' => $book->id]) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- Book title -->
                        <div class="form-group">
                            <label for="bookTitle" class="col-sm-3 control-label">Title</label>

                            <div class="col-sm-6">
                                <input type="text" name="bookTitle" id="bookTitle"
                                       class="form-control" value="{{ $book->title }}"
                                       placeholder="Please, write the title here.">
                            </div>
                        </div>
                        <!-- book author -->
                        <div class="form-group">
                            <label for="bookAuthor" class="col-sm-3 control-label">Author</label>

                            <div class="col-sm-6">
                                <input type="text" name="bookAuthor" id="bookAuthor"
                                       class="form-control" value="{{ $book->author }}"
                                       placeholder="Yea, author's name goes right here.">
                            </div>
                        </div>
                        <!-- book ISBN -->
                        <div class="form-group">
                            <label for="bookISBN" class="col-sm-3 control-label">ISBN</label>

                            <div class="col-sm-6">
                                <input type="text" name="bookISBN" id="bookISBN"
                                       class="form-control" value="{{ $book->isbn }}"
                                       placeholder="Must be unique, you know.">
                            </div>
                        </div>
                        <!-- book genre -->
                        <div class="form-group">
                            <label for="bookGenre" class="col-sm-3 control-label">Genre</label>

                            <div class="col-sm-6">
                                <input type="search" name="bookGenre" id="bookGenre"
                                       class="form-control" value="{{ $book->genre }}"
                                       placeholder="Whatever, please.">
                            </div>
                        </div>
                        <!-- number of print copies of the book -->
                        <div class="form-group">
                            <label for="copies" class="col-sm-3 control-label">Number of copies</label>

                            <div class="col-sm-6">
                                <input type="number" name="copies" id="copies"
                                       class="form-control" value="{{ $book->copies }}"
                                       placeholder="https://en.wikipedia.org/wiki/Natural_number">
                            </div>
                        </div>
                        <!-- Search Book Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn"></i>Save
                                </button>
                                @if ($book->id == null)
                                    <a href="/" class="btn btn-default" role="button">Cancel</a>
                                @else
                                    <!-- todo: change the url and write the controller -->
                                    <a href="/{{ $book->id }}" class="btn btn-danger" role="button">Delete it</a>
                                    <a href="{{ route('display_book', ['book' => $book->id]) }}" class="btn btn-default" role="button">Cancel</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection