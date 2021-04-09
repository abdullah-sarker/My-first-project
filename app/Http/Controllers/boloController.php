<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class boloController extends Controller
{
    public function writepost(){
        return view('post.writepost');
    }
    public function contact(){
        $category=DB::table('categories')->get();
        return view('pages.contact', compact('category'));
    }
    public function addcategory(){
        return view('post.add_category');
    }

    public function storescategory(Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        if ($category){
            return Redirect()->back();
        }else{
            return Redirect()->back();
        }

    }

    public function allcategory(){
        $category=DB::table('categories')->get();

        return view('post.all_category', compact('category'));
    }

    
}
