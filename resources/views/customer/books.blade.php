@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">

                <!-- Reservations -->
                <div class="panel-heading">
                    <strong>Reservations</strong>
                </div>

                <div class="panel-body">
                    @if ( $loans != null)
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Title</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Genre</th>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td class="table-text"><div>{{ $loan->book->title }}</div></td>
                                        <td class="table-text"><div>{{ $loan->book->author }}</div></td>
                                        <td class="table-text"><div>{{ $loan->book->isbn }}</div></td>
                                        <td class="table-text"><div>{{ $loan->book->genre }}</div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>

                <!-- Loans -->
                <div class="panel-heading">
                    <strong>Loans</strong>
                </div>

                <div class="panel-body">
                    Hello.
                </div>
            </div>
        </div>
    </div>
@endsection

