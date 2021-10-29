<?php

namespace App\Modules\Service\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Service\Service,
	Http\Controllers\Controller
};

class ServiceController extends Controller
{
	// view.backend.pages.menu.service.index
	public function index()
	{
		$data['page_title'] = 'Service';
		$data['service'] = Service::all()->toArray();
		return view('backend.pages.menu.service.index', $data);
	}
	// view.backend.pages.menu.service.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Service';
		$data['service'] = Service::findOrFail($id);
		return view('backend.pages.menu.service.edit', $data);
	}
	// post action
	public function update(Request $request, Service $service)
	{
        $data = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);
        $service->update($data);
        return redirect()->back()->with('success','Service has been updated');
	}
}
