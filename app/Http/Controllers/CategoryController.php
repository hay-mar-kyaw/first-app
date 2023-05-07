<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index(){
        $categories=Category::all();
        return view('categories.index',['categories'=>$categories]);
    }
    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        Category::create([
            'name'=>$request->input('name')
        ]);

        return redirect('/categories')->with('status','Category created successfully');
    }

    public function show($id){
        $category=Category::find($id);
        return view('categories.edit',['category'=>$category]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required'
        ]);
        Category::find($id)->update([
            'name'=>$request->input('name')
        ]);

        return redirect('categories')->with('status','Category Updated Successfully');
    }

    public function destroy($id){
        Category::destroy($id);
        return redirect('categories')->with('status','Category deleted successfully');
    }
}
