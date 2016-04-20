@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Library System User Table</h2>
        <div class="table-responsive">
            <table class="table">
                        <thead>
                        <th>Name</th>
                        <th>Email</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr class='clickable-row @if(!$user->active) danger @endif'
                                data-href='/librarian/display_user/{{ $user->id }}' role="button">
                                <td class="table-text"><div>{{ $user->name }}</div></td>
                                <td class="table-text"><div>{{ $user->email }}</div></td>
                                @permission('adminPermission')
                                    <td>
                                        <form action="{{ route('admin_manage_user') }}" method="POST">
                                            {!! csrf_field() !!}

                                            @if($user->hasRole('librarian'))
                                                <button type="submit" id="make-customer-{{ $user->id }}" name="makeCustomer"
                                                        value="{{ $user->id }}"
                                                        class="btn btn-default">Make Customer
                                                </button>
                                            @else
                                                <button type="submit" id="make-librarian-{{ $user->id }}" name="makeLibrarian"
                                                        value="{{ $user->id }}"
                                                        class="btn btn-success">Make Librarian
                                                </button>
                                            @endif

                                            <button type="submit" id="delete-user-{{ $user->id }}" name="deleteUser"
                                                    value="{{ $user->id }}"
                                                    class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                @endpermission
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">{!! $users->links() !!}</div>
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

