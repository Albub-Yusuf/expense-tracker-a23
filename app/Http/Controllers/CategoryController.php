<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

use function Laravel\Prompts\alert;

class CategoryController extends Controller
{
    public function index(){
        
        $userID = Auth::user()->id;
        $data['serial'] = 1;
        
        $data['categories'] =  Category::where('user_id',$userID)->paginate(5);

        return view('categories.index',$data);
    }

    public function create(){

        return view('categories.create');

    }

    public function store(Request $request){
       
        $request->validate([
            'category' => 'required'
        ]);

       $result = Category::create([
            'category'=>$request->category,
            'user_id'=>$request->userId
        ]);

        if($result){
      
            return redirect()->route('category.index')->with('success', 'Category Added Successfully');

        }else{
            return redirect()->route('category.index')->with('failed', 'Something went wrong!');
        }
    }

    public function edit(Category $category){
        $data['categoryDetails'] = Category::where('user_id',Auth::user()->id)->where('id',$category->id)->first();
        return view('categories.edit',$data);
    }

    public function update(Category $category,Request $request){

        $request->validate([
            'category' => 'required'
        ]);
        
        $result = Category::where('user_id',Auth::user()->id)->where('id',$category->id)
                    ->update([
                        'category'=>$request->category,
                        'user_id'=>Auth::user()->id
                    ]);
        if($result){
            return redirect()->route('category.index')->with('updated', 'Category Updated Successfully!');

        }else{
            return redirect()->route('category.index')->with('failed', 'Something went wrong!');

        }

        
    }

    public function destroy(Category $category){



        $result = Category::where('user_id',Auth::user()->id)->where('id',$category->id)
                    ->delete();
        if($result){
            return redirect()->route('category.index')->with('deleted', 'Category deleted Successfully!');

        }else{
            return redirect()->route('category.index')->with('failed', 'Something went wrong!');

        }
    }
}
