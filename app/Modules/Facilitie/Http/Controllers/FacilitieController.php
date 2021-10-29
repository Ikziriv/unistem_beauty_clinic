<?php

namespace App\Modules\Facilitie\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\ {
	Modules\Facilitie\Facilitie,
	Http\Controllers\Controller
};

class FacilitieController extends Controller
{
	// view.backend.pages.menu.facilitie.index
	public function index(Request $request)
	{
		$data['page_title'] = 'Facilitie';
		$data['facilitie'] = Facilitie::where(function($query) use ($request) {
	        if (($search = $request->get('search_facilitie'))) {
	          $query->orWhere('date', 'like', '%' . $search . '%');
	          }
        })
        ->orderBy("id", "desc")
        ->simplePaginate(5);
		return view('backend.pages.menu.facilitie.index', $data);
	}
	// view.backend.pages.menu.facilitie.upload
	public function create()
	{
		$data['page_title'] = 'Facilitie Upload';

		return view('backend.pages.menu.facilitie.upload', $data);
	}
	// view.backend.pages.menu.facilitie.upload
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'date_upload' => 'required'
        ]);
        $facilitie = new Facilitie();
        if ($request->file('path_img') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('path_img');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'facilitie/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $facilitie->path_img = $path;
        }
        $data = array(
            $facilitie->path_img = $path,
            $facilitie->date_upload = $request->input('date_upload')
        );
        $facilitie->save($data);
        return redirect()->back()->with('success','Facilitie has been upload!');
	}
	// delete action
	public function destroy($id)
	{
        $facilitie = Facilitie::findOrFail($id);
        $facilitie->delete();
        Storage::disk('public')->delete($facilitie->path_img);

        return redirect()->back()->with('success','Facilitie has been deleted');
	}
}
