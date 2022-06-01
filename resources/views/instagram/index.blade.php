@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa-brands fa-instagram"></i> Instagram</div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach($instagrams as $instagram)
                        <div class="col">
                            <div class="card shadow-sm">
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
