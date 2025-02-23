<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiriesController extends Controller
{
    public function enquiry(Request $request){

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:20|regex:/^\+?[0-9]{7,20}$/',
            'message' => 'required',
        ]);
    
        $enquiry = new Enquiry;
        $enquiry->name = $validateData['name'];
        $enquiry->email = $validateData['email'];
        $enquiry->phone_number = $validateData['phone_number'];
        $enquiry->message = $validateData['message'];
        $enquiry->status = $request->status;
        $enquiry->save();

        return redirect()->back()->with('success', 'Enquiry send successfully');
       }
}
