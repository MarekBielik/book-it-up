@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong> {{  $book->title }} </strong>
                </div>

                <div class="panel-body">
                    Author: <br> {{ $book->author }} <br><br>
                    ISBN: <br> {{ $book->isbn }} <br><br>
                    Genre: <br> {{ $book->genre }}<br><br>
                    In stock: <br> {{ $book->inStockCopies() }}<br><br>
                    On Loan: <br> {{ $book->onLoanCopies() }} <br><br>
                    @if ($book->inStockCopies())
                        <a href="/customer/reserve/{{ $book->id }}" class="btn btn-primary" role="button">Book it</a>
                        @endif
                    @permission('librarianPermission')
                    <a href="/librarian/edit_book/{{ $book->id }}" class="btn btn-default" role="button">Edit it</a>
                    @endpermission
                </div>
            </div>
        </div>
    </div>
@endsection

