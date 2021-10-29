<?php

namespace App\Modules\Testimonial\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Testimonial\Testimonial,
	Http\Controllers\Controller
};

class TestimonialController extends Controller
{
	// view.backend.pages.testimonial.index
	public function index()
	{
		$data['page_title'] = 'Testimonial';
		$data['testimonial'] = Testimonial::all()->toArray();
		return view('backend.pages.testimonial.index', $data);
	}
	// view.backend.pages.testimonial.create
	public function create()
	{
		$data['page_title'] = 'Create Testimonial';
		return view('backend.pages.testimonial.create', $data);
	}
	// post action
	public function store(Request $request)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'message' => 'required',
        ]);

        $testimonial = new Testimonial();
        $data = array(
            $testimonial->name = $request->input('name'),
            $testimonial->message = $request->input('message'),
        );
        $testimonial->save($data);
        return redirect()->back()->with('success','Testimonial has been saved');

	}
	// view.backend.pages.testimonial.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Testimonial';
		$data['testimonial'] = Testimonial::findOrFail($id);
		return view('backend.pages.testimonial.edit', $data);
	}
	// post action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'name' => 'required',
            'message' => 'required',
        ]);

        $testimonial = Testimonial::find($id);

        $data = array(
            $testimonial->name = $request->input('name'),
            $testimonial->message = $request->input('message'),
        );
        $testimonial->update($data);
        return redirect()->back()->with('success','Testimonial has been updated');
	}
	// delete action
	public function destroy($id)
	{
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->back()->with('success','Testimonial has been deleted');
	}
}
