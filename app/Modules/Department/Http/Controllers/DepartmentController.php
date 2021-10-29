<?php

namespace App\Modules\Department\Http\Controllers;

use DB;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\ {
	Modules\Department\Department,
	Http\Controllers\Controller
};

class DepartmentController extends Controller
{
	// view.backend.pages.menu.department.index
	public function index()
	{
		$data['page_title'] = 'Main Service';
		$data['department'] = Department::all()->toArray();
		return view('backend.pages.menu.department.index', $data);
	}
	// view.backend.pages.menu.department.create
	public function create()
	{
		$data['page_title'] = 'Create Main Service';
		return view('backend.pages.menu.department.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'name' => 'required'
        ]);

        $dept = new Department();
        if ($request->file('img_path') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_path');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'dept/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $dept->img_path = $path;
        }
        $data = array(
            $dept->img_path = $path,
            $dept->name = $request->input('name'),
            $dept->description = $request->input('content'),
            $dept->slug = str_slug($request->input('name'), '-')
        );
        $dept->save($data);
        return redirect()->back()->with('success','Main Service has been saved');

	}
	// view.backend.pages.menu.department.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Main Service';
		$data['department'] = Department::findOrFail($id);
		return view('backend.pages.menu.department.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'name' => 'required'
        ]);

        $dept_old = Department::find($id);
        $dept = new Department();
        if ($request->file('img_path') === null) {
            $path = $dept->img_path;
        } else {
            $img = $request->file('img_path');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'dept/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $dept->img_path = $path;
        }

        $data = array(
            $dept->img_path = $path,
            $dept->name = $request->input('name'),
            $dept->description = $request->input('content'),
            $dept->slug = str_slug($request->input('name'), '-')
        );
        $dept->save($data);
        // Delete
        $dept_old->delete();
        Storage::disk('public')->delete($dept_old->img_path);
        return redirect()->route('dept')->with('success','Main Service has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $dept = Department::findOrFail($id);
        $dept->delete();

        return redirect()->back()->with('success','Main Service has been deleted');
	}
}
