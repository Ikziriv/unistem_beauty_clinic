<?php

namespace App\Modules\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Contact\Contact,
	Http\Controllers\Controller
};

class ContactController extends Controller
{
	// view.backend.pages.menu.contact.index
	public function index()
	{
		$data['page_title'] = 'Contact';
		$data['contact'] = Contact::all()->toArray();
		return view('backend.pages.menu.contact.index', $data);
	}
	// view.backend.pages.menu.contact.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Contact';
		$data['contact'] = Contact::findOrFail($id);
		return view('backend.pages.menu.contact.edit', $data);
	}
	// post action
	public function update(Request $request, Contact $contact)
	{
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);
        $contact->update($data);
        return redirect()->back()->with('success','Contact has been updated');
	}
}
