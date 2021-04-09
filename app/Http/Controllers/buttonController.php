<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class buttonController extends Controller
{
   public function viewcategory($id){
        $cetagory=DB::table('categories')->where('id',$id)->first();
        //return view('post.categoryview')->with('cat',$cetagory);
        return view('post.categoryview',compact('cetagory'));
   }

   public function Deletecategory($id){
       $delete=DB::table('categories')->where('id', $id)->delete();
       return Redirect()->back();

   }
   
   public function Editcategory($id){
       $category=DB::table('categories')->where('id',$id)->first();
       return view('post.edit_category', compact('category'));
   }

   public function Updatecategory(Request $request, $id){
    $validated = $request->validate([
        'name' => 'required|max:25|min:4',
        'slug' => 'required|max:25|min:4',
    ]);
        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id', $id)->update($data);
        if ($category){
            return Redirect()->route('all.category');
        }else{
            return Redirect()->route('all.category');
        }
    }
 
}
