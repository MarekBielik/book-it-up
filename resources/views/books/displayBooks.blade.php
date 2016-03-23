@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Genre</th>
                        <th>In stock</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td class="table-text"><div>{{ $book->title }}</div></td>
                                <td class="table-text"><div>{{ $book->author }}</div></td>
                                <td class="table-text"><div>{{ $book->isbn }}</div></td>
                                <td class="table-text"><div>{{ $book->genre }}</div></td>
                                @if ($book->freeCopies())
                                    <td><span class="label label-success">Yes</span></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection