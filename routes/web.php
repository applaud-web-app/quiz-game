<?php

use Illuminate\Support\Facades\Route;

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
 

Route::get('playground',function(){
    // event(new \App\Events\PlaygroundEvent());
    return 0;
});

Route::get('ws',function(){
    return view('websocket');
});

Route::post('/chat-message',function(\Illuminate\Http\Request $request){
    event(new \App\Events\PlaygroundEvent($request->message));
    return null;
});

Route::get('create-user',function(){
    // \DB::table('users')->insert(['name'=>'Admin','email'=>'admin@gmail.com','email_verified_at'=>date("Y-m-d H:i:s"),'password'=>\Hash::make('123456'),'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);
    \Auth::loginUsingId(1);

});

