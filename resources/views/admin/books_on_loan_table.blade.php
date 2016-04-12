<div class="container" xmlns:overflow="http://www.w3.org/1999/xhtml" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="col-sm-11">
        <div class="panel panel-default">
            @section('reservations&loans')
            @show
            <div class="panel-heading">
                <strong>Full Report on all Loans</strong>
            </div>
                <!-- All Loans -->
            <div class="panel-body">
                @if ( count($loans) != 0)
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Title</th>
                        <th>From</th>
                        <th>Due At</th>
                        <th>Renewals</th>
                        <th>Is it Active?</th>
                        <th>Book ID</th>
                        <th>Customer ID</th>
                        <th>Librarian ID</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <td class="table-text"><div>{{ $loan->book->title }}</div></td>
                                <td class="table-text"><div>{{ $loan->from }}</div></td>
                                <td class="table-text"><div>{{ $loan->due_to }}</div></td>
                                <td class="table-text"><div>{{ $loan->renewals }}</div></td>
                                <td class="table-text"><div>{{ $loan->isActive }}</div></td>
                                <td class="table-text"><div>{{ $loan->book_id }}</div></td>
                                <td class="table-text"><div>{{ $loan->customer_id }}</div></td>
                                <td class="table-text"><div>{{ $loan->librarian_id }}</div></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
                <!-- End Loans -->
                <div class="panel-heading center">
                    <strong>Most Popular Book</strong>
                </div>
                <!-- Popular Item -->
                <div class="panel-body" ;>
                    <table class="table table-striped task-table">
                        <th>Book ID</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="table-text"><div>{{ $popBook->book_id }}</div></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

        </div>
    </div>
</div>