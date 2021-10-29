<?php

namespace App\Modules\Hasci\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\ {
	Modules\Hasci\HasciHeader,
	Http\Controllers\Controller
};

class HasciHeaderController extends Controller
{
	// view.backend.pages.hasci.header.index
	public function index()
	{
		$data['page_title'] = 'Hasci Header Page';
		$data['hasci_header'] = HasciHeader::all()->toArray();
		return view('backend.pages.hasci.header.index', $data);
	}
	// view.backend.pages.hasci.header.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Hasci Header Page';
		$data['hasci_header'] = HasciHeader::findOrFail($id);
		return view('backend.pages.hasci.header.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'title' => 'required'
        ]);

        $hasci_header_old = HasciHeader::find($id);
        $hasci_header = new HasciHeader();
        if ($request->file('img_head') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'hasci_header/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $hasci_header->img_head = $path;
        }

        $data = array(
            $hasci_header->img_head = $path,
            $hasci_header->title = $request->input('title'),
            $hasci_header->content = $request->input('content')
        );
        $hasci_header->save($data);
        // Delete
        $hasci_header_old->delete();
        Storage::disk('public')->delete($hasci_header_old->img_head);
        return redirect()->back()->with('success','Hasci Header has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $hasci_header = HasciHeader::findOrFail($id);
        $hasci_header->delete();

        return redirect()->back()->with('success','Hasci Header has been deleted');
	}
}
