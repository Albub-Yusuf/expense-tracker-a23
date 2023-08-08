<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index(){
        $userID = Auth::user()->id;
        $data['serial'] = 1;
        
        $data['expenses'] = Expense::with('category')->where('user_id',$userID)->orderBy('id','DESC')->get();
        $data['totalExpense'] =  Expense::where('user_id',Auth::user()->id)->sum('amount');

         return view('expenses.index',$data);
    }

    public function create(){

        $data['categories'] = Category::where('user_id',Auth::user()->id)->get();

        return view('expenses.create',$data);

    }

    public function store(Request $request){

        $request->validate([

            'details'=>'required',
            'amount' => 'required|integer',
            'date' => 'required',
            'category'=>'required'

        ]);
        $result = Expense::create([
            'details'=>$request->details,
            'amount'=>$request->amount,
            'date'=>$request->date,
            'category_id'=>$request->category,
            'user_id'=>$request->userId
        ]);

        if($result){
      
            return redirect()->route('expense.index')->with('success', 'Expense Added Successfully');

        }else{
            return redirect()->route('expense.index')->with('failed', 'Something went wrong!');
        }
    }


    public function edit(Expense $expense){

        $data['expenseDetails'] = Expense::with('category')->where('user_id',Auth::user()->id)->where('id',$expense->id)->first();
        $data['categories'] = Category::where('user_id',Auth()->user()->id)->get();
        return view('expenses.edit',$data);

    }

    public function update(Expense $expense,Request $request){
        

        $request->validate([
            'details' => 'required',
            'amount' => 'required|integer',
            'date' => 'required',
            'category'=>'required'
            
        ]);
        

        $result = Expense::where('user_id',Auth::user()->id)->where('id',$expense->id)
                    ->update([
                        'details'=>$request->details,
                        'amount'=>$request->amount,
                        'date'=>$request->date,
                        'category_id'=>$request->category,
                        'user_id'=>Auth::user()->id
                    ]);
        if($result){
            return redirect()->route('expense.index')->with('updated', 'Expense Updated Successfully!');

        }else{
            return redirect()->route('expense.index')->with('failed', 'Something went wrong!');

        }


    }

    public function destroy(Expense $expense){



        $result = Expense::where('user_id',Auth::user()->id)->where('id',$expense->id)
                    ->delete();
        if($result){
            return redirect()->route('expense.index')->with('deleted', 'Expense deleted Successfully!');

        }else{
            return redirect()->route('expense.index')->with('failed', 'Something went wrong!');

        }
    }

    public function totalExpense(){
        $totalExpense = Expense::where('user_id',Auth::user()->id)->sum('amount');
        return $totalExpense;
    }
}
