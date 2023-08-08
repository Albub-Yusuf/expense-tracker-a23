<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        $data['totalIncome'] = Income::where('user_id',Auth::user()->id)->sum('amount');
        $data['totalExpense'] = Expense::where('user_id',Auth::user()->id)->sum('amount');
        $data['balanced'] = $data['totalIncome'] - $data['totalExpense'];

        return view('dashboard',$data);
    }
}
