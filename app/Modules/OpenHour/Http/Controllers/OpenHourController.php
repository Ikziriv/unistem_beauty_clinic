<?php

namespace App\Modules\OpenHour\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\OpenHour\OpenHour,
	Http\Controllers\Controller
};

class OpenHourController extends Controller
{
	// view.backend.pages.menu.openhour.index
	public function index()
	{
		$data['page_title'] = 'Open Hour';
		$data['open_hour'] = OpenHour::all()->toArray();
		return view('backend.pages.menu.openhour.index', $data);
	}
	// view.backend.pages.menu.openhour.create
	public function create()
	{
		$data['page_title'] = 'Create Open Hour';
		return view('backend.pages.menu.openhour.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'days' => 'required',
            'time' => 'required'
        ]);

        $open_hour = new OpenHour();
        $data = array(
            $open_hour->name = $request->input('days'),
            $open_hour->time = $request->input('time')
        );
        $open_hour->save($data);
        return redirect()->back()->with('success','Open Hour has been saved');

	}
	// view.backend.pages.menu.openhour.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Open Hour';
		$data['open_hour'] = OpenHour::findOrFail($id);
		return view('backend.pages.menu.openhour.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'days' => 'required',
            'time' => 'required'
        ]);

        $open_hour = OpenHour::find($id);

        $data = array(
            $open_hour->name = $request->input('days'),
            $open_hour->time = $request->input('time')
        );
        $open_hour->update($data);
        return redirect()->back()->with('success','Open Hour has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $open_hour = OpenHour::findOrFail($id);
        $open_hour->delete();

        return redirect()->back()->with('success','Open Hour has been deleted');
	}
}
