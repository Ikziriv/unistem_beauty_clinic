<?php

namespace App\Modules\Hasci\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Hasci\HasciBody,
	Http\Controllers\Controller
};

class HasciBodyController extends Controller
{
	// view.backend.pages.hasci.body.index
	public function index()
	{
		$data['page_title'] = 'Hasci Body Page';
		$data['hasci_body'] = HasciBody::all()->toArray();
		return view('backend.pages.hasci.body.index', $data);
	}
	// view.backend.pages.hasci.body.create
	public function create()
	{
		$data['page_title'] = 'Create Hasci Body Page';
		return view('backend.pages.hasci.body.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'title' => 'required'
        ]);

        $hasci_body = new HasciBody();
        if ($request->file('img_head') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'hasci_body/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $hasci_body->img_head = $path;
        }
        $data = array(
            $hasci_body->img_head = $path,
            $hasci_body->title = $request->input('title'),
            $hasci_body->content = $request->input('content')
        );
        $hasci_body->save($data);
        return redirect()->back()->with('success', 'Hasci Body been saved');

	}
	// view.backend.pages.hasci.body.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Hasci Body Page';
		$data['hasci_body'] = HasciBody::findOrFail($id);
		return view('backend.pages.hasci.body.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'title' => 'required'
        ]);

        $hasci_body = HasciBody::find($id);
        if ($request->file('img_head') === null) {
            $path = $hasci_body->img_head;
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'hasci_body/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $hasci_body->img_head = $path;
        }

        $data = array(
            $hasci_body->img_head = $path,
            $hasci_body->title = $request->input('title'),
            $hasci_body->content = $request->input('content')
        );
        $hasci_body->update($data);
        return redirect()->back()->with('success','Hasci Body has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $hasci_body = HasciBody::findOrFail($id);
        $hasci_body->delete();

        return redirect()->back()->with('success','Hasci Body has been deleted');
	}
}
