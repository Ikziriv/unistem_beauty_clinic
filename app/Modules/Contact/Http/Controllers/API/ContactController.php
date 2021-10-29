<?php

namespace App\Modules\Contact\Http\Controllers\API;

use Illuminate\Http\Request;
use App\ {
    Http\Resources\Contact\ContactResource,
    Http\Controllers\Controller,
    Modules\Contact\Contact
};

class ContactController extends Controller
{
	// 
	public function index()
	{
        return Contact::all();
	}
    // 
    public function show(Contact $contact)
    {
        return new ContactResource($contact);
    }
}
