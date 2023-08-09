<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index(){
        
        $userID = Auth::user()->id;
        $data['serial'] = 1;
        
        $data['incomes'] =  Income::where('user_id',$userID)->orderBy('id','DESC')->get();
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

        return view('income.index',$data);
    }

    public function create(){

        return view('income.create');

    }

    public function store(Request $request){
       
        $request->validate([
            'details' => 'required',
            'amount' => 'required|integer',
            'date' => 'required'
        ]);
       

       $result = Income::create([
            'details'=>$request->details,
            'amount'=>$request->amount,
            'date'=>$request->date,
            'user_id'=>$request->userId
        ]);

        if($result){
      
            return redirect()->route('income.index')->with('success', 'Income Added Successfully');

        }else{
            return redirect()->route('income.index')->with('failed', 'Something went wrong!');
        }
    }

    public function edit(Income $income){
        $data['incomeDetails'] = Income::where('user_id',Auth::user()->id)->where('id',$income->id)->first();
        return view('income.edit',$data);
    }

    public function update(Income $income,Request $request){

        

        $request->validate([
            'details' => 'required',
            'amount' => 'required|integer',
            'date' => 'required',
            
        ]);
        

        $result = Income::where('user_id',Auth::user()->id)->where('id',$income->id)
                    ->update([
                        'details'=>$request->details,
                        'amount'=>$request->amount,
                        'date'=>$request->date,
                        'user_id'=>Auth::user()->id
                    ]);
        if($result){
            return redirect()->route('income.index')->with('updated', 'Income Updated Successfully!');

        }else{
            return redirect()->route('income.index')->with('failed', 'Something went wrong!');

        }

        
    }

    public function destroy(Income $income){



        $result = Income::where('user_id',Auth::user()->id)->where('id',$income->id)
                    ->delete();
        if($result){
            return redirect()->route('income.index')->with('deleted', 'Income deleted Successfully!');

        }else{
            return redirect()->route('income.index')->with('failed', 'Something went wrong!');

        }
    }

    public function totalIncome(){
        $totalIncome = Income::where('user_id',Auth::user()->id)->sum('amount');
        return $totalIncome;
    }
}
