<?php

namespace App\Modules\Staff\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Staff\Staff,
	Http\Controllers\Controller
};

class StaffController extends Controller
{
	// view.backend.pages.staff.index
	public function index()
	{
		$data['page_title'] = 'Staff';
		$data['staff'] = Staff::all()->toArray();
		return view('backend.pages.staff.index', $data);
	}
	// view.backend.pages.staff.create
	public function create()
	{
		$data['page_title'] = 'Create Staff';
		return view('backend.pages.staff.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $staff = new DoctorSub();
        if ($request->file('img_head') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'staff/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $staff->img_head = $path;
        }

        $data = array(
            $staff->img_head = $path,
            $staff->name = $request->input('name'),
            $staff->phone = $request->input('phone'),
            $staff->address = $request->input('address')
        );
        $staff->save($data);
        return redirect()->back()->with('success','Profile has been saved');
	}
	// view.backend.pages.staff.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Staff';
		$data['staff'] = Staff::findOrFail($id);
		return view('backend.pages.staff.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $staff_old = DoctorSub::find($id);
        $staff = new DoctorSub();
        if ($request->file('img_head') === null) {
            $path = $staff->img_head;
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'staff/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $staff->img_head = $path;
        }

        $data = array(
            $staff->img_head = $path,
            $staff->name = $request->input('name'),
            $staff->phone = $request->input('phone'),
            $staff->address = $request->input('address')
        );
        $staff->save($data);
        // Delete
        $staff_old->delete();
        Storage::disk('public')->delete($staff_old->img_head);
        return redirect()->back()->with('success','Staff has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->back()->with('success','Staff has been deleted');
	}
}
