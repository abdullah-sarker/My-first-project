<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/concel', function(){
//     return view('pages.index');
// });
Route::get('/concel','HelloController@index');


Route::get('/about.us','HelloController@manus')->name('about');
Route::get('/student.us','HelloController@student')->name('student');
Route::get('/contact','boloController@contact')->name('contact');

//category rout har her....
Route::get('all/category','boloController@allcategory')->name('all.category');
Route::get('Add/category','boloController@addcategory')->name('add.category');
Route::post('store/catogory','boloController@storescategory')->name('store.category');

//Edit Delete view...
Route::get('view/category/{id}','buttonController@viewcategory');
Route::get('delete/category/{id}','buttonController@Deletecategory');
Route::get('edit/category/{id}','buttonController@Editcategory');
Route::post('update/category/{id}','buttonController@Updatecategory');

//post store...
Route::post('store/post', 'postController@Storepost')->name('store.post');
Route::get('all/post', 'postController@Allpost')->name('all.post');
Route::get('view/post/{id}','postController@viewpost');
Route::get('delete/post/{id}','postController@Deletepost');
Route::get('edit/post/{id}', 'postController@Editpost');
Route::post('update/post/{id}','postController@Updatepost');

//postview..
Route::get('post/view/{id}', 'HelloController@Postsview');


