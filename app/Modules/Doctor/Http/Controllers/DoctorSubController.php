<?php

namespace App\Modules\Doctor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\ {
	Modules\Doctor\DoctorSub,
	Http\Controllers\Controller
};

class DoctorSubController extends Controller
{
	// view.backend.pages.menu.doctor.subdoctor.index
	public function index()
	{
		$data['page_title'] = 'Sub Doctor';
		$data['subdoctor'] = DoctorSub::all()->toArray();
		return view('backend.pages.doctor.subdoctor.index', $data);
	}
	// view.backend.pages.doctor.subdoctor.create
	public function create()
	{
		$data['page_title'] = 'Doctor Profile Create';
		return view('backend.pages.doctor.subdoctor.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'sub_title' => 'required',
            'quote' => 'required',
            'phone' => 'required',
            'content' => 'required'
        ]);

        $subdoctor = new DoctorSub();
        if ($request->file('img_head') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'subdoctor/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $subdoctor->img_head = $path;
        }

        $data = array(
            $subdoctor->img_head = $path,
            $subdoctor->name = $request->input('name'),
            $subdoctor->sub_title = $request->input('sub_title'),
            $subdoctor->quote = $request->input('quote'),
            $subdoctor->phone = $request->input('phone'),
            $subdoctor->content = $request->input('content')
        );
        $subdoctor->save($data);
        return redirect()->back()->with('success','Profile has been saved');
	}
	// view.backend.pages.doctor.subdoctor.edit
	public function edit($id)
	{
		$data['page_title'] = 'Doctor Profile Edit';
		$data['subdoctor'] = DoctorSub::findOrFail($id);
		return view('backend.pages.doctor.subdoctor.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'sub_title' => 'required',
            'quote' => 'required',
            'phone' => 'required',
            'content' => 'required'
        ]);

        $subdoctor_old = DoctorSub::find($id);
        $subdoctor = new DoctorSub();
        if ($request->file('img_head') === null) {
            $path = $subdoctor->img_head;
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'subdoctor/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $subdoctor->img_head = $path;
        }

        $data = array(
            $subdoctor->img_head = $path,
            $subdoctor->name = $request->input('name'),
            $subdoctor->sub_title = $request->input('sub_title'),
            $subdoctor->quote = $request->input('quote'),
            $subdoctor->phone = $request->input('phone'),
            $subdoctor->content = $request->input('content')
        );
        $subdoctor->save($data);
        // Delete
        $subdoctor_old->delete();
        Storage::disk('public')->delete($subdoctor_old->img_head);
        return redirect()->route('subdoctor')->with('success','Profile has been updated');
	}
	// get action
	public function show($id)
	{
		$data['page_title'] = 'View Sub Sub Service';
		$data['subdoctor'] = DoctorSub::findOrFail($id);
		return view('backend.pages.doctor.subdoctor.show', $data);
	}
	// delete action
	public function destroy($id)
	{
        $subdoctor = DoctorSub::findOrFail($id);
        $subdoctor->delete();
        Storage::disk('public')->delete($subdoctor->img_head);

        return redirect()->back()->with('success','Profile has been deleted');
	}
	// Schedule
	public function create_schedule()
	{
		$data['page_title'] = 'Doctor Schedule Create';
		$data['subdoctor'] = DoctorSub::findOrFail($id);
		return view('backend.pages.doctor.subdoctor.create', $data);
	}
}
