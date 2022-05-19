<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Instagram;

class InstagramController extends Controller
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
        Log::debug(Auth::user()->name." : === Open Instagram Top Page Start ===");
        $insta_info = new Instagram();
        $instagrams = $insta_info->getInstagramData();
        Log::debug(Auth::user()->name." : === Open Instagram Top Page End ===");
        return view('instagram.index',["instagrams"=>$instagrams]);
    }
}
