<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        return view('address.index');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'address_line' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'user_id' => 'required|exists:users,id',
            'province' => 'required|string|max:100',
            'zip' => 'required|digits:4'
          ]);



        $address = new Address;
    $address->address_line = $validatedData['address_line'];
    $address->user_id = $validatedData['user_id'];
    $address->province = $validatedData['province'];
    $address->zip = $validatedData['zip'];
    $address->city = $validatedData['city'];
    $address->save();
    return redirect()->back()->with('sucess', 'address added');
}

public function update(Request $request) 
{
    $address = Address::where('user_id', Auth::id())->firstOrFail(); 

    if (!$address) {
        return redirect()->back()->withErrors('User not authenticated.');
    }

    $validatedData = $request->validate([
        'address_line' => 'required|string|max:255',
        'city' => 'required|string|max:100',
        'province' => 'required|string|max:100',
        'zip' => 'required|digits:4',
    ]);

    $address->address_line = $validatedData['address_line'];
    $address->city = $validatedData['city'];
    $address->province = $validatedData['province'];
    $address->zip = $validatedData['zip'];

    $address->save(); // Save address changes

    return redirect()->back()->with('message', 'Details updated successfully.');
}
       
    }


    
