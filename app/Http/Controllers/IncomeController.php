<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index(){
        
        $userID = Auth::user()->id;
        $data['serial'] = 1;
        
        $data['incomes'] =  Income::where('user_id',$userID)->orderBy('id','DESC')->paginate(10);

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
}
