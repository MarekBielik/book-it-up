@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="text-center">
                <strong> Full Report  </strong>
            </div>

            <div class="panel-body">
                @include('admin.books_on_loan_table')
            </div>
        </div>
    </div>
@endsection
