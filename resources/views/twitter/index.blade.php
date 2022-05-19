@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Twitter -->
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa-brands fa-twitter"></i> Twitter</div>

                <div class="card-body">
                    @foreach($tweets as $tweet)
                    <div class="alert alert-danger mb-2">{{ date("m/d/Y",strtotime($tweet->created_at)) }} : {{ $tweet->text }} : {{ $tweet->user->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
