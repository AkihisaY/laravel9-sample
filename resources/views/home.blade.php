@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Twitter -->
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Twitter</div>

                <div class="card-body">
                    @foreach($tweets as $tweet)
                    <div class="alert alert-danger mb-2">{{ $tweet->created_at }} : {{ $tweet->text }} : {{ $tweet->user->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Instagram</div>

                <!-- <div class="card-body">
                    @foreach($instagrams as $instagram)
                    <div class="alert alert-success mb-2">Link : {{ $instagram["like_count"] }} , {{ $instagram["caption"] }}<br><img style="height:100px;width:100px" src="{{ $instagram["media_url"] }}"></div>
                    @endforeach
                </div> -->
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach($instagrams as $instagram)
                        <div class="col">
                            <div class="card">
                                <img src="{{ $instagram['media_url'] }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">{{ $instagram["caption"] }}</h5>
                                <p class="card-text"><i class="fa-regular fa-thumbs-up"></i> : {{ $instagram["like_count"] }} </p>
                                <p class="card-text">Created : {{ date("m/d/Y",strtotime($instagram["timestamp"])) }} </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
