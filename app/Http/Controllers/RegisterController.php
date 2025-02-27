<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required',
        'surname' => 'required',
        'email' => 'required|email|unique:users,email',
        'phone_number' => 'required|regex:/^(\+?\d{1,3})?\d{10}$/',
        'password' => 'required|confirmed|min:8',
      ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->email = $validatedData['email'];
        $user->phone_number = $validatedData['phone_number'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->route('login')->with('success', 'User registered successfully.');
}

}