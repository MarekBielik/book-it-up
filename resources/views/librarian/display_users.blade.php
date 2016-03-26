@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Name</th>
                        <th>Email</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class='clickable-row' data-href='/librarian/display_user/{{ $user->id }}' role="button">
                                <td class="table-text"><div>{{ $user->name }}</div></td>
                                <td class="table-text"><div>{{ $user->email }}</div></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- make the rows clickable -->
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
@endsection

