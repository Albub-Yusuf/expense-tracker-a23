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
        
        $data['expenses'] = Expense::with('category')->where('user_id',$userID)->paginate(10);

         return view('expenses.index',$data);
    }

    public function create(){

        $data['categories'] = Category::where('user_id',Auth::user()->id)->get();

        return view('expenses.create',$data);

    }
}
