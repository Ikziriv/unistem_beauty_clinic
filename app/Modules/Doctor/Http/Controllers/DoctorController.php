<?php

namespace App\Modules\Doctor\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\ {
	Modules\Doctor\Doctor,
	Http\Controllers\Controller
};

class DoctorController extends Controller
{
	// view.backend.pages.menu.doctor.index
	public function index()
	{
		$data['page_title'] = 'Doctor';
		$data['doctor'] = Doctor::all()->toArray();
		return view('backend.pages.doctor.index', $data);
	}
	// view.backend.pages.Doctor.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Doctor Page';
		$data['doctor'] = Doctor::findOrFail($id);
		return view('backend.pages.doctor.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        $doctor_old = Doctor::find($id);
        $doctor = new Doctor();
        if ($request->file('img_head') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $img = $request->file('img_head');
            $filename =  time() . '_' . $img->getClientOriginalName();
            $path = 'doctor/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($img->getRealPath()));
            $doctor->img_head = $path;
        }

        $data = array(
            $doctor->img_head = $path,
            $doctor->title = $request->input('title'),
            $doctor->content = $request->input('content')
        );
        $doctor->save($data);
        // Delete
        $doctor_old->delete();
        Storage::disk('public')->delete($doctor_old->img_head);
        return redirect()->route('doctor')->with('success','Doctor page has been updated');
	}
}
