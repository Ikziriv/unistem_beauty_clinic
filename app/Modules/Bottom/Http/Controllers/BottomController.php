<?php

namespace App\Modules\Bottom\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Bottom\Bottom,
	Http\Controllers\Controller
};

class BottomController extends Controller
{
	// view.backend.pages.menu.bottom.index
	public function index()
	{
		$data['page_title'] = 'Bottom';
		$data['bottom'] = Bottom::all()->toArray();
		return view('backend.pages.menu.bottom.index', $data);
	}
	// view.backend.pages.menu.bottom.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Bottom';
		$data['bottom'] = Bottom::findOrFail($id);
		return view('backend.pages.menu.bottom.edit', $data);
	}
	// post action
	public function update(Request $request, Bottom $bottom)
	{
        $data = $this->validate(request(), [
            'address' => 'required'
        ]);
        $bottom->update($data);
        return redirect()->back()->with('success','Bottom has been updated');
	}
}
