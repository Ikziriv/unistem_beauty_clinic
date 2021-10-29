<?php

namespace App\Modules\SosialLink\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\SosialLink\SosialLink,
	Http\Controllers\Controller
};

class SosialLinkController extends Controller
{
	// view.backend.pages.menu.sosialink.index
	public function index()
	{
		$data['page_title'] = 'Sosial Link';
		$data['sosial_link'] = SosialLink::all()->toArray();
		return view('backend.pages.menu.sosialink.index', $data);
	}
	// view.backend.pages.menu.sosialink.create
	public function create()
	{
		$data['page_title'] = 'Create Category';
		return view('backend.pages.menu.sosialink.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'link' => 'required',
            'icon' => 'required'
        ]);

        $sosial_link = new SosialLink();
        $data = array(
            $sosial_link->name = $request->input('name'),
            $sosial_link->link = $request->input('link'),
            $sosial_link->icon = $request->input('icon')
        );
        $sosial_link->save($data);
        return redirect()->back()->with('success','Sosial Link has been saved');

	}
	// view.backend.pages.menu.sosialink.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Category';
		$data['sosial_link'] = SosialLink::findOrFail($id);
		return view('backend.pages.menu.sosialink.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'link' => 'required',
            'icon' => 'required'
        ]);

        $sosial_link = SosialLink::find($id);

        $data = array(
            $sosial_link->name = $request->input('name'),
            $sosial_link->link = $request->input('link'),
            $sosial_link->icon = $request->input('icon')
        );
        $sosial_link->update($data);
        return redirect()->back()->with('success','Sosial Link has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $sosial_link = SosialLink::findOrFail($id);
        $sosial_link->delete();

        return redirect()->back()->with('success','Sosial Link has been deleted');
	}
}
