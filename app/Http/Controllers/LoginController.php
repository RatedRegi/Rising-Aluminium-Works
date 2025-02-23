<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
       $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
       ]);

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();

            $user = Auth::user();

            if($user->role === 'admin'){
                return redirect()->route('main_page')->with('success', 'You are logged in!');
            }elseif ($user->role === 'user') {
                return redirect()->route('home')->with('success', 'You are logged in!');
            }

           Auth::logout();
           return back()->withErrors(['email'=> 'unauthorized role'])->onlyInput('email');
       }

       return back()->withErrors([
        'email' => 'the provided credentials do not match our records in the database',
       ])->onlyInput('email');
    }
}