<?php

namespace App\Modules\Appointment\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ {
	Modules\Appointment\Appointment,
	Http\Controllers\Controller
};

class AppointmentController extends Controller
{
	// view.backend.pages.appointment.index
	public function index()
	{
		$data['page_title'] = 'Appointment';
		$data['appointment'] = Appointment::with('doctor')->get();
		return view('backend.pages.appointment.index', $data);
	}
	// view.backend.pages.appointment.create
	public function create()
	{
		$data['page_title'] = 'Create Appointment';
		$data['doctor'] = DB::table('doctor_subs')->select('id', 'name')->get();
		return view('backend.pages.appointment.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $appointment = new Appointment();
        $data = array(
            $appointment->doctor_id = $request->input('doctor_id'),
            $appointment->name = $request->input('name'),
            $appointment->email = $request->input('email'),
            $appointment->message = $request->input('message'),
            $appointment->scheduled_time = $request->input('scheduled_time'),
        );
        $appointment->save($data);
        return redirect()->back()->with('success','Appointment has been saved');

	}
	// view.backend.pages.appointment.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Appointment';
		$data['appointment'] = Appointment::findOrFail($id);
		return view('backend.pages.appointment.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $appointment = Appointment::find($id);

        $data = array(
            $appointment->doctor_id = $request->input('doctor_id'),
            $appointment->name = $request->input('name'),
            $appointment->email = $request->input('email'),
            $appointment->message = $request->input('message'),
            $appointment->scheduled_time = $request->input('scheduled_time'),
        );
        $appointment->update($data);
        return redirect()->back()->with('success','Appointment has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success','Appointment has been deleted');
	}
}
