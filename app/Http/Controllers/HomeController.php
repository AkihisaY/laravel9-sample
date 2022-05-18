<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Utils\Common;
use App\Models\Api;
use App\Models\Asset;
use App\Models\Expense;
use App\Models\Instagram;
use App\Models\Twitter;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Log::info(" Open Top Page");
        //Get Tweets
        $twitter_info = new Twitter();
        $tweets = $twitter_info->showTweet();
        //Get Asset Data
        $asset = Asset::limit(1)->get();
        // Log::debug($asset);
        //Get Instagram Data from API
        $insta_info = new Instagram();
        $instagrams = $insta_info->getInstagramData();
        // dd($instagrams);

        return view('home',["tweets"=>$tweets,"asset"=>$asset
                        ,"instagrams"=>$instagrams]);
    }
}
