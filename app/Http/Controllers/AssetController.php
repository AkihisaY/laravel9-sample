<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
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
        Log::debug(Auth::user()->name." : === Open Asset Top Page Start ===");
        Log::debug(Auth::user()->name." : === Open Asset Top Page End ===");
        return view('asset.index');
    }
}
