@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Search Book Form -->
            <form action="/search_book" method="GET" class="form-horizontal">
                {{ csrf_field() }}
                <!-- Book title or author -->
                <div class="form-group">
                    <label for="search-book" class="col-sm-3 control-label"></label>

                    <div class="col-sm-6">
                        <input type="search" name="searchBook" id="search-book"
                               class="form-control" value="{{ old('book') }}"
                                placeholder="Book title or author, it's up to you, it's your life. Decide.">
                    </div>
                </div>

                <!-- Search Book Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn"></i>Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
