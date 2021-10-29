<?php

namespace App\Modules\Header\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Header\Header,
	Http\Controllers\Controller
};

class HeaderController extends Controller
{
	// view.backend.pages.menu.header.index
	public function index()
	{
		$data['page_title'] = 'Header';
		$data['header'] = Header::all()->toArray();
		return view('backend.pages.menu.header.index', $data);
	}
	// view.backend.pages.menu.header.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Header';
		$data['header'] = Header::findOrFail($id);
		return view('backend.pages.menu.header.edit', $data);
	}
	// post action
	public function update(Request $request, Header $header)
	{
        $data = $this->validate(request(), [
            'title' => 'required',
            'subtitle' => 'required',
            'phone' => 'required'
        ]);
        $header->update($data);
        return redirect()->back()->with('success','Header has been updated');
	}
}
