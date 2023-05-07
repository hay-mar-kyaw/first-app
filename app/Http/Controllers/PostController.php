<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function create(){
        $categories=Category::all();
        return view('create',compact('categories'));
    }

    private function uploadImage(Request $request)
{
    $request->validate([
        'image' => 'required|image|max:2048'
    ]);

    $image = $request->file('image');

    try {
        $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/images'), $img_name);
        return $img_name;
    } catch (\Exception $e) {
        // Handle the exception (e.g. log error message, show error page)
        return null;
    }
}


    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'description'=>'required',
            'category'=>'required'
        ]);
        $image_name=$this->uploadImage($request);
        $category=$request->input('category');
        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'image'=>$image_name,
            'category'=>$category

        ]);

        return redirect('posts')->with('status','Post created successfully');
    }

    public function index(){

        $posts=Post::all();
        return view('index',['posts'=>$posts]);

    }

    public function show($id){
        $post=Post::find($id);
        $categories=Category::all();
        return view('edit',compact('post','categories'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'category'=>'required',
            'description'=>'required'
        ]);

        if(request()->has('image')){
            $image=request()->file('image');
            $image_name=$image->getClientOriginalName();
            $image->move(public_path('/images'),$image_name);


        }

        Post::find($id)->update([
            'title'=>$request->input('title'),
            'image'=>$image_name,
            'description'=>$request->input('description'),
            'category'=>$request->input('category')
        ]);

        return redirect('posts')->with('status','Post Updated Successfully');
    }
    public function destroy($id){
        Post::destroy($id);
        return redirect('posts')->with('status','Post Deleted Successfully');
    }
}
