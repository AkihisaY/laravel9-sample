<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Asset;

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
        $assets = Asset::limit(10)->get();
        // Log::debug($asset);
        Log::debug(Auth::user()->name." : === Open Asset Top Page End ===");
        return view('asset.index',['assets'=>$assets]);
    }

    public function chart(Request $request){
        Log::info(Auth::user()->name." : === Open Asset Chart Ajax Start ===");
        $assets = Asset::select(DB::raw("to_char(target_date,'mm/yyyy') as target_date"),'total')
                ->limit(8)->orderby('id','asc')->get();
        // Log::debug($assets);
        Log::info(Auth::user()->name." : === Open Asset Chart Ajax End ===");
        return response()->json(['status'=>true,'assets'=>$assets]);
    }

}
