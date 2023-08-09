<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;

class CheckRecordsController extends Controller
{
    public function summaryPage(){
        $data['showTable'] = 0;
        return view('records.summary',$data);
    }

    public function calculateRedcords(Request $request){
        
        $startDate = $request->startingDate;
        $endDate = $request->endDate;
        
       


        if($request->option==1){

            $data['showTable'] = 1;
            $data['serial'] = 1;
            $data['recordsData'] = Income::where('user_id',$request->userId)->whereBetween('date',[$startDate,$endDate])->get();
            $data['recordsTotal'] = Income::where('user_id',$request->userId)->whereBetween('date',[$startDate,$endDate])->sum('amount');

            return view('records.summary',$data);
        }
        else if($request->option==2){
            $data['showTable'] = 2;
            $data['serial'] = 1;
            $data['recordsData'] = Expense::with('category')->where('user_id',$request->userId)->whereBetween('date',[$startDate,$endDate])->get();
            $data['recordsTotal'] = Expense::where('user_id',$request->userId)->whereBetween('date',[$startDate,$endDate])->sum('amount');

            return view('records.summary',$data);
            
        }else if($request->option==3){

            $data['showTable'] = 3;
            $data['serial'] = 1;
            $data['recordsTotalIncome'] = Income::where('user_id',$request->userId)->whereBetween('date',[$startDate,$endDate])->sum('amount');
            $data['recordsTotalExpense'] = Expense::where('user_id',$request->userId)->whereBetween('date',[$startDate,$endDate])->sum('amount');

            return view('records.summary',$data);
        }   


    }
}
