@extends('layouts.app')

@section('content')
<script src="{{ asset('js/asset.js') }}"></script>
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card shadow mb-3">
                <div class="card-header">
                    <i class="fa-solid fa-chart-column"></i> Asset Chart
                </div>
                <div class="card-body">
                    <!-- Chart Test-->
                    <div class="card mb-4">
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <!-- Asset List -->
                    <div class="mb-1">
                        <p class="h4"><strong>Monthly Asset History</strong></p>
                        <table class="table table-borderless" style="word-break:break-all;">
                            <thead>
                                <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Bank JP</th>
                                <th scope="col">Bank US</th>
                                <th scope="col">Cash JP</th>
                                <th scope="col">Cash US</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($assets as $key => $asset)
                                <tr>
                                    <td>{{ date("m/Y",strtotime($asset->target_date)) }}</td>
                                    <td>{{ number_format($asset->bank_jpy) }}</td>
                                    <td>{{ number_format($asset->bank_usd) }}</td>
                                    <td>{{ number_format($asset->investigation_jpy) }}</td>
                                    <td>{{ number_format($asset->investigation_usd) }}</td>
                                    <td>{{ number_format($asset->stock) }}</td>
                                    <td>{{ number_format($asset->total) }}</td>
                                    <td>@if(count($assets) > $key+1)
                                            @if($assets[$key+1]->total > $asset->total)
                                                <scan class="text-danger"><i class="fa-solid fa-arrow-down"></i></scan>
                                            @else
                                                <scan class="text-primary"><i class="fa-solid fa-arrow-up"></i></scan>
                                            @endif
                                        @endif
                                    </td>
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
@endsection
