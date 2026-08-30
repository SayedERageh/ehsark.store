<?php
    //use App\Models\Contact;
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController 
{


public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'message' => 'required|string',
    ]);

    Contact::create($request->all());

    return back()->with('success', 'تم إرسال طلبك بنجاح 👍');
}
}
