<?php

namespace App\Modules\Service\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\ {
	Modules\Service\SubService,
	Http\Controllers\Controller
};

class SubServiceController extends Controller
{
	// view.backend.pages.menu.service.subservice.index
	public function index()
	{
		$data['page_title'] = 'Sub Service';
		$data['subservice'] = SubService::all()->toArray();
		return view('backend.pages.menu.service.subservice.index', $data);
	}
	// view.backend.pages.menu.service.subservice.edit
	public function create()
	{
		$data['page_title'] = 'Create Sub Service';
        $data['departments'] = DB::table('departments')->select('id', 'name')->get();
		return view('backend.pages.menu.service.subservice.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        $subservice = new SubService();
        if ($request->file('img_head') === null) {
            $path = '/img/noimage.jpg';
        } else {
            // $fileExtension = $request->file('img_head')->getClientOriginalExtension();
            // $fileName = bin2hex(openssl_random_pseudo_bytes(7)) . '.' . $fileExtension;
            // $request->file('img_head')
            //         ->move(base_path() . '/public/img/bamed/subservice/', $fileName);
            // $path = '/img/bamed/subservice/' . $fileName;
            // $subservice->img_head = $path;
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'subservice/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $subservice->img_head = $path;
        }

        $data = array(
            $subservice->img_head = $path,
            $subservice->dept_id = $request->input('dept_id'),
            $subservice->title = $request->input('title'),
            $subservice->slug = str_slug($request->input('title'), '-'),
            $subservice->content = $request->input('content')
        );
        $subservice->save($data);
        return redirect()->back()->with('success','Sub Service has been saved');
	}
	// view.backend.pages.menu.service.subservice.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Sub Service';
		$data['subservice'] = SubService::findOrFail($id);
        $data['departments'] = DB::table('departments')->select('id', 'name')->get();
		return view('backend.pages.menu.service.subservice.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        $subservice = SubService::find($id);
        if ($request->file('img_head') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'subservice/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $subservice->img_head = $path;
        }

        $data = array(
            $subservice->img_head = $path,
            $subservice->dept_id = $request->input('dept_id'),
            $subservice->title = $request->input('title'),
            $subservice->slug = str_slug($request->input('title'), '-'),
            $subservice->content = $request->input('content')
        );
        $subservice->update($data);
        return redirect()->back()->with('success','Sub Service has been updated');
	}
	// get action
	public function show($id)
	{
		$data['page_title'] = 'View Sub Service';
		$data['subservice'] = SubService::findOrFail($id);
		return view('backend.pages.menu.service.subservice.show', $data);
	}
	// delete action
	public function destroy($id)
	{
        $subservice = SubService::findOrFail($id);
        $subservice->delete();

        return redirect()->back()->with('success','Sub Service has been deleted');
	}
}
