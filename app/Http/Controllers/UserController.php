<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\UpdatePasswordRequest;

class UserController extends Controller
{
  public function update(Request $request) 
  {
    $address = Address::where('user_id', Auth::id())->firstOrFail(); 
    if (!$address) {
        return redirect()->back()->withErrors('User not authenticated.');
    }
    $user = User::find(Auth::id());

      $validatedData = $request->validate([
          'name' => 'required|string|max:255',
          'surname' => 'required|string|max:255',
          'email' => 'required|email|unique:users,email,' . Auth::id(), // Allow current user's email
          'phone_number' => 'nullable|regex:/^(\+?\d{1,3})?\d{10}$/',
          'current_password' => 'nullable|current_password',
          'new_password' => 'nullable|confirmed|min:8',
          'address_line' => 'required|string|max:255',
          'city' => 'required|string|max:100',
          'province' => 'required|string|max:100',
          'zip' => 'required|digits:4',
      ]);

        //   Update user address
        $address->address_line = $validatedData['address_line'];
        $address->city = $validatedData['city'];
        $address->province = $validatedData['province'];
        $address->zip = $validatedData['zip'];
    
        $address->save(); // Save address changes
    //   Update user details
      $user->name = $validatedData['name'];
      $user->surname = $validatedData['surname'];
      $user->email = $validatedData['email'];
      $user->phone_number = $validatedData['phone_number'];
 
    //   Update password if provided
      if ($request->filled('new_password')) {
          $user->password = Hash::make($validatedData['new_password']);
      }
      
      $user->save(); // Save user changes
  
      return redirect()->back()->with('message', 'Details updated successfully.');
  }
  
}
