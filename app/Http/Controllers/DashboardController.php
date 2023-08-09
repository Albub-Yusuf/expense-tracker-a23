<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){

        $data['totalIncome'] = Income::where('user_id',Auth::user()->id)->sum('amount');
        $data['totalExpense'] = Expense::where('user_id',Auth::user()->id)->sum('amount');
        $data['balanced'] = $data['totalIncome'] - $data['totalExpense'];

        $now = Carbon::now();
        $currentMonth = $now->format('m');
        $currentYear = $now->format('Y');

        $data['currentMonthIncome'] = Income::where('user_id',Auth::user()->id)
                                    ->whereMonth('date',$currentMonth)->whereYear('date',$currentYear)->sum('amount');
        
        $data['currentMonthExpense'] = Expense::where('user_id',Auth::user()->id)
                                    ->whereMonth('date',$currentMonth)->whereYear('date',$currentYear)->sum('amount');
      
        $data['currentMonthBalance'] = $data['currentMonthIncome'] - $data['currentMonthExpense'];

        return view('dashboard',$data);
    }
}
