@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="span12">
            @include('customer.books_table')
        </div>
    </div>
@endsection

