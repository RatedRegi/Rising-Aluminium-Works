<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonyController extends Controller
{
    public function store(Request $request) {
        if(Auth::check()){
            $user = Auth::id();
            $validatedData = $request->validate([
                'message' => 'required|'
            ]);
    
            Testimony::create([
                'user_id' => $user,
                'message' =>  $validatedData['message']
            ]);
            return redirect()->back();
        }else{
            return redirect()->route('login');
        }
       
    }
}
