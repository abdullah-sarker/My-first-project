<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class postController extends Controller
{
    public function Storepost(Request $request){
        

        $validated = $request->validate([
            'title' => 'required',
            'details' => 'required|max:300',
            'image' => 'required | mimes:jpeg,jpg,png | max:1000',
        ]);
        $data=array();
        $data['category_id']=$request->category_id;
        $data['title']=$request->title;
        $data['details']=$request->details;

        $image=$request->file('image');
        if ($image){
            $ext=$image->getClientOriginalName();
            // $image_full_name=$image_name.'.'.$ext;
            $upload_path='upload/image/';
            $image_url=$upload_path.$ext;
            $success=$image->move($upload_path,$ext);
            $data['image']=$image_url;
            $category=DB::table('posts')->insert($data);
            return Redirect()->back();
  
        }  
        
    }

    public function Allpost(){
        $post=DB::table('posts')->join('categories','posts.category_id','categories.id')
          ->select('posts.*','categories.name')->get();
        return view('post.all_post', compact('post'));
    }

    public function viewpost($id){
        $post=DB::table('posts')->join('categories','posts.category_id','categories.id')
          ->select('posts.*','categories.name')->where('posts.id',$id)->first();
        return view('post.view_post', compact('post'));
    }

    public function Deletepost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->image;
        $delete=DB::table('posts')->where('id',$id)->delete();
        unlink($image);
        return Redirect()->back();
        
    }

   public function Editpost($id){
       $category=DB::table('categories')->get();
       $post=DB::table('posts')->where('id', $id)->first();
       return view('post.edit_post', compact('category','post'));
   }

   public function Updatepost(Request $request, $id){
    $validated = $request->validate([
        'title' => 'required',
        'details' => 'required|max:300',
        'image' => 'mimes:jpeg,jpg,png | max:1000',
    ]);
    $data=array();
    $data['category_id']=$request->category_id;
    $data['title']=$request->title;
    $data['details']=$request->details;
    $image=$request->file('image');
    if ($image){
        $image_name=hexdec(uniqid());
        $ext=$image->getClientOriginalExtension();
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='upload/image/';
        $image_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);
        $data['image']=$image_url;
        unlink($request->old_photo);
        $category=DB::table('posts')->where('id', $id)->update($data);
        return Redirect()->back();
        
        
    }
   }
}
