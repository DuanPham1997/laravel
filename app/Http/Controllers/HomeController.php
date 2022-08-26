<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Events\LoginHistory;
class HomeController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            event(new LoginHistory($user));
           return redirect()->route('user.index');
        }else{
            return back()->with('err','sai thong tin tai khoan');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('user.index');
    }
}
