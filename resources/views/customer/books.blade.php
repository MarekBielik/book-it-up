@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">

                <!-- Reservations -->
                <div class="panel-heading">
                    <strong>Reservations</strong>
                </div>

                <div class="panel-body">
                    @if ( count($reservations) != 0)
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Genre</th>
                            <th>Reserved</th>
                            <th>Due To</th>
                            <th></th>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                    <td class="table-text"><div>{{ $reservation->book->title }}</div></td>
                                    <td class="table-text"><div>{{ $reservation->book->author }}</div></td>
                                    <td class="table-text"><div>{{ $reservation->book->isbn }}</div></td>
                                    <td class="table-text"><div>{{ $reservation->book->genre }}</div></td>
                                    <td class="table-text"><div>{{ $reservation->from }}</div></td>
                                    <td class="table-text"><div>{{ $reservation->due_to }}</div></td>
                                    <td><div><a href="/customer/cancel/{{ $reservation->id }}" class="btn btn-primary" role="button">Cancel</a></div></td>
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
                    @if ( count($loans) != 0)
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Genre</th>
                            <th>Reserved</th>
                            <th>Due To</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach ($loans as $loan)
                                @if ($loan->librarian == null)
                                    <tr>
                                        <td class="table-text"><div>{{ $loan->book->title }}</div></td>
                                        <td class="table-text"><div>{{ $loan->book->author }}</div></td>
                                        <td class="table-text"><div>{{ $loan->book->isbn }}</div></td>
                                        <td class="table-text"><div>{{ $loan->book->genre }}</div></td>
                                        <td class="table-text"><div>{{ $loan->from }}</div></td>
                                        <td class="table-text"><div>{{ $loan->due_to }}</div></td>
                                        <td><div><a href="/customer/cancel/{{ $loan->id }}" class="btn btn-primary" role="button">Cancel</a></div></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

