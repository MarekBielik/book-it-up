@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong> Search for users</strong>
                </div>

                <div class="panel-body">
                    <form action="{{ route('search_user_submit') }}" method="GET" class="form-horizontal">
                        {{ csrf_field() }}
                                <!-- Users name or email -->
                        <div class="form-group">
                            <label for="search-user" class="col-sm-3 control-label"></label>

                            <div class="col-sm-6">
                                <input type="search" name="searchUser" id="search-user"
                                       class="form-control" value="{{ old('user') }}"
                                       placeholder="User's email or name. Whatever.">
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
    </div>
@endsection