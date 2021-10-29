<?php

namespace App\Modules\Doctor\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ {
	Modules\Doctor\DoctorSub,
	Modules\Doctor\DoctorSchedule,
	Modules\City\City,
	Http\Controllers\Controller
};

class DoctorScheduleController extends Controller
{
	// view.backend.pages.menu.doctor.schedule.index
	public function index()
	{
		$data['page_title'] = 'Schedule';
		$data['schedule'] = DoctorSchedule::with('city')->with('doctor')->get();
		return view('backend.pages.doctor.schedule.index', $data);
	}
	// view.backend.pages.doctor.schedule.create
	public function create()
	{
		$data['page_title'] = 'Create Schedule';
		$data['doctor'] = DB::table('doctor_subs')->select('id', 'name')->get();
		$data['city'] = DB::table('cities')->select('id', 'name')->get();
		return view('backend.pages.doctor.schedule.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $schedule = new DoctorSchedule();
        $data = array(
            $schedule->city_id = $request->input('city_id'),
            $schedule->doctor_id = $request->input('doctor_id'),
            $schedule->day = $request->input('day'),
            $schedule->start_time = $request->input('start_time'),
            $schedule->end_time = $request->input('end_time')
        );
        $schedule->save($data);
        return redirect()->back()->with('success','Schedule has been saved');

	}
	// view.backend.pages.doctor.schedule.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Schedule';
		$data['schedule'] = DoctorSchedule::findOrFail($id);
		$data['city'] = DB::table('cities')->select('id', 'name')->get();
		$data['doctor'] = DB::table('doctor_subs')->select('id', 'name')->get();
		return view('backend.pages.doctor.schedule.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        $schedule = DoctorSchedule::find($id);

        $data = array(
            // $schedule->city_id = $request->input('city_id'),
            // $schedule->doctor_id = $request->input('doctor_id'),
            $schedule->day = $request->input('day'),
            $schedule->start_time = $request->input('start_time'),
            $schedule->end_time = $request->input('end_time')
        );
        $schedule->update($data);
        return redirect()->back()->with('success','Schedule has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $schedule = DoctorSchedule::findOrFail($id);
        $schedule->delete();

        return redirect()->back()->with('success','Schedule Profile has been deleted');
	}
}
