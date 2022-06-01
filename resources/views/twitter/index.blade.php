@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Profile -->
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa-regular fa-address-card"></i> Profile</div>
                <div class="card-body">
                    <p><img src="{{ $profile->profile_banner_url }}" class="img-thumbnail" alt="..."></p>
                    <div class="row">
                        <div class="col-sm-10">
                            <p class="h4 ps-2"><strong>{{ $profile->name }}</strong></p>
                            <p class="ps-2">{{ $profile->screen_name }}</p>
                            <p class="ps-2">{{ $profile->description }}</p>
                            <p class="ps-2"><i class="fa-solid fa-location-dot"></i> <a href="https://www.google.com/maps/place/San+Jose,+CA/@37.2967792,-121.9574974,11z/data=!3m1!4b1!4m5!3m4!1s0x808fcae48af93ff5:0xb99d8c0aca9f717b!8m2!3d37.3382082!4d-121.8863286">{{ $profile->location }}</a>  <i class="fa-brands fa-linkedin"></i> <a href="{{$profile->url}}">{{ $profile->url }}</a></p>
                            <p class="ps-2"><span class="h5">{{ $profile->followers_count }}</span> Followers <span class="h5">{{ $profile->friends_count }}</span> Following </p>
                        </div>
                        <div class="col-sm-2 text-end">
                            <button class="btn btn-dark btn-sm pe-2" data-bs-toggle="modal" data-bs-target="#exampleModal">tweet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Twitter -->
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa-brands fa-twitter"></i> Twitter</div>

                <div class="card-body">
                    @foreach($tweets as $tweet)
                    <div class="alert alert-danger mb-2">{{ date("m/d/Y",strtotime($tweet->created_at)) }} : {{ $tweet->text }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-dark btn-sm">Tweet</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
