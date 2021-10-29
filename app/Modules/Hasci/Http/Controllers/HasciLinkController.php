<?php

namespace App\Modules\Hasci\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Hasci\HasciLink,
	Http\Controllers\Controller
};

class HasciLinkController extends Controller
{
	// view.backend.pages.hasci.link.index
	public function index()
	{
		$data['page_title'] = 'Hasci Link Page';
		$data['hasci_link'] = HasciLink::all()->toArray();
		return view('backend.pages.hasci.link.index', $data);
	}
	// view.backend.pages.hasci.link.create
	public function create()
	{
		$data['page_title'] = 'Create Hasci Link Page';
		return view('backend.pages.hasci.link.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'title' => 'required'
        ]);

        $hasci_link = new HasciLink();
        if ($request->file('img_head') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'hasci_link/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $hasci_link->img_head = $path;
        }
        $data = array(
            $hasci_link->img_head = $path,
            $hasci_link->title = $request->input('title'),
            $hasci_link->link = $request->input('link')
        );
        $hasci_link->save($data);
        return redirect()->back()->with('success', 'Hasci Link been saved');

	}
	// view.backend.pages.hasci.link.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Hasci Link Page';
		$data['hasci_link'] = HasciLink::findOrFail($id);
		return view('backend.pages.hasci.link.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'title' => 'required'
        ]);

        $hasci_link = HasciLink::find($id);
        if ($request->file('img_head') === null) {
            $path = $hasci_link->img_head;
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'hasci_link/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $hasci_link->img_head = $path;
        }

        $data = array(
            $hasci_link->img_head = $path,
            $hasci_link->title = $request->input('title'),
            $hasci_link->link = $request->input('link')
        );
        $hasci_link->update($data);
        return redirect()->back()->with('success','Hasci Link has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $hasci_link = HasciLink::findOrFail($id);
        $hasci_link->delete();

        return redirect()->back()->with('success','Hasci Link has been deleted');
	}
}
