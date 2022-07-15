<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

class ExpenseController extends Controller
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
        Log::debug(Auth::user()->name." : === Open Expense Top Page Start ===");
        $expenses = Expense::limit(100)->get();
        Log::debug(Auth::user()->name." : === Open Expense Top Page End ===");
        return view('expense.index',['expenses'=>$expenses]);
    }
}
