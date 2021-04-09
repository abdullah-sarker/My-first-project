<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    public function index(){
        $post=DB::table('posts')->join('categories','posts.category_id','categories.id')
         ->select('posts.*','categories.name','categories.slug')->paginate(2);
         return view('pages.index', compact('post'));
    }
    public function manus(){
        return view('pages.about');
    }
    public function student(){
        return view('pages.student');
    }

    public function Postsview($id){
        $post=DB::table('posts')->join('categories','posts.category_id','categories.id')
          ->select('posts.*','categories.name')->where('posts.id',$id)->first();
        return view('post.postview', compact('post'));
        
    } 
}
