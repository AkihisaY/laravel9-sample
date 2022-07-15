@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card shadow mb-3">
                <div class="card-header">
                    <i class="fa-solid fa-dollar-sign"></i> Expense History
                </div>
                <div class="card-body">
                    <!-- Expense List -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table table-borderless" style="word-break:break-all;">
                                <thead>
                                    <tr>
                                        <th scope="col">Payment Date</th>
                                        <th scope="col">Amount(USD)</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">City</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Country</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenses as $key => $expense)
                                    <tr>
                                        <td>{{ date("m/Y",strtotime($expense->pay_date)) }}</td>
                                        <td>{{ number_format($expense->pay_amount) }}</td>
                                        <td>{{ $expense->contents }}</td>
                                        <td>{{ $expense->city }}</td>
                                        <td>{{ $expense->state }}</td>
                                        <td>{{ $expense->country }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
@endsection
