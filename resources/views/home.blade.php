@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <a style="text-decoration:none;color:black;" href="{{ route('instagram') }}">
                    <div class="card shadow-sm">
                        <img src="./img/IMG_2944.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"><i class="fa-brands fa-instagram"></i> Instagram</h5>
                        <p class="card-text"><i class="fa-regular fa-thumbs-up"></i> : {{ count($instagrams) }} </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col">
                    <a style="text-decoration:none;color:black;" href="{{ route('twitter') }}">
                    <div class="card shadow-sm">
                        <img src="./img/IMG_2953.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"><i class="fa-brands fa-twitter"></i> Twitter</h5>
                        <p class="card-text"><i class="fa-regular fa-thumbs-up"></i> : {{ count($tweets) }} </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col">
                    <a style="text-decoration:none;color:black;" href="{{ route('asset') }}">
                    <div class="card shadow-sm">
                        <img src="./img/IMG_2992.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-sack-dollar"></i> Asset</h5>
                        <p class="card-text"><i class="fa-regular fa-thumbs-up"></i> : {{ count($instagrams) }} </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col">
                    <a style="text-decoration:none;color:black;" href="{{ route('expense') }}">
                    <div class="card shadow-sm">
                        <img src="./img/IMG_3065.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-money-bill-wave"></i> Expenses</h5>
                        <p class="card-text"><i class="fa-regular fa-thumbs-up"></i> : {{ count($instagrams) }} </p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
