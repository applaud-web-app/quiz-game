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

// Route::post('/test-message',function(\Illuminate\Http\Request $request){
//     event(new \App\Events\ParticipantEvent($request->message));
//     return null;
// });

Route::get('create-user',function(){
    // \DB::table('users')->insert(['name'=>'Admin','email'=>'admin@gmail.com','email_verified_at'=>date("Y-m-d H:i:s"),'password'=>\Hash::make('123456'),'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);
    \Auth::loginUsingId(1);
});


Route::get('register',function(){
    return view('register');
});

Route::post('store-user',function(\Illuminate\Http\Request $request){
    \DB::table('users')->insert(['name'=>$request->f_name,'email'=>$request->email,'email_verified_at'=>date("Y-m-d H:i:s"),'password'=>\Hash::make($request->password),'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);
    return redirect('login');
});


Route::get('login',function(){
    return view('login');
});

Route::post('login-user',function(\Illuminate\Http\Request $request){
    $userAuth = [
        'email'=>$request->email,
        'password'=>$request->password,
    ];
    if(\Auth::attempt($userAuth,1)){
        return redirect('participate');
    }
});

Route::get('participate',function(){
    return view('participate');
});

Route::get('play-game',function(){
    return view('play-game');
});

Route::get('store-participate',function(){
    \DB::table('participants')->insert(['user_id'=>\Auth::id(),'c_user_id'=>0,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);
    $checkPartcipant = \DB::table('participants')->select('id','user_id')->where('c_user_id',0)->where('user_id','!=',\Auth::id())->inRandomOrder()->first();
    if($checkPartcipant){
        // update table data
        \DB::table('participants')->where('id',$checkPartcipant->id)->update(['c_user_id'=>\Auth::id()]);
        \DB::table('participants')->where('user_id',Auth::id())->update(['c_user_id'=>$checkPartcipant->user_id]);
        $data = [
            'com_id'=>$checkPartcipant->user_id,
            'url'=>url('play-game')
        ];
        event(new \App\Events\ParticipantEvent($data));
        return redirect('play-game');
    }
    return redirect('participate');
});

