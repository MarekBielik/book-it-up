@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
                <div class="text-center">
                    <strong> {{  $user->name }} | {{ $user->email }} </strong>
                </div>

                <div class="panel-body">
                    @include('customer.books_table')
                </div>
        </div>
    </div>
@endsection

