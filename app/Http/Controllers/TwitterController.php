<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Twitter;

class TwitterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Open Asset Top Page
     */
    public function index(Request $request){
        Log::debug(Auth::user()->name." : === Open Twitter Top Page Start ===");
        $twitter_info = new Twitter();
        $tweets = $twitter_info->showTweet();

        $profile = $twitter_info->getProfile();
        // $friends = $twitter_info->friendList();
        // $followers = $twitter_info->followerList();
        // $profile = $twitter_info->uploadImage();

        Log::debug(Auth::user()->name." : === Open Twitter Top Page End ===");
        return view('twitter.index',["tweets"=>$tweets,"profile"=>$profile]);
    }
}
