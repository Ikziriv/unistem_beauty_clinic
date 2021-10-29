<?php

namespace App\Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
	Modules\Client\Client,
	Http\Controllers\Controller
};

class ClientController extends Controller
{
	// view.backend.pages.menu.doctor.subdoctor.index
	public function index()
	{
		$data['page_title'] = 'Client';
		$data['client'] = Client::all()->toArray();
		return view('backend.pages.client.index', $data);
	}
    // Tester Email
    // view.backend.pages.client.create
    public function create()
    {
        $data['page_title'] = 'Create Client';
        return view('backend.pages.client.create', $data);
    }
	// view.backend.pages.client.edit
	public function edit($id)
	{
		$data['page_title'] = 'Edit Client';
		$data['client'] = Client::findOrFail($id);
		return view('backend.pages.client.edit', $data);
	}
	// client action
	public function update(Request $request, $id)
	{
        $data = $this->validate(request(), [
            'gender' => 'required',
            'phone_number' => 'required',
            'birth_date' => 'required'
        ]);

        $client = Client::find($id);
        if ($request->file('profile_picture') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $fileName = $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')
                    ->move(base_path() . '/public/img/bamed/client/', $fileName);
            $path = '/img/bamed/client/' . $fileName;
            $client->profile_picture = $path;
        }
        if ($request->file('bg_member') === null) {
            $path = '/img/noimage.jpg';
        } else {
            $fileName = $request->file('bg_member')->getClientOriginalName();
            $request->file('bg_member')
                    ->move(base_path() . '/public/img/bamed/client/bg_member/', $fileName);
            $path = '/img/bamed/client/bg_member/' . $fileName;
            $client->bg_member = $path;
        }

        $data = array(
            $client->profile_picture = $path,
            $client->bg_member = $request->input('bg_member'),
            $client->name = $request->input('name'),
            $client->gender = $request->input('gender'),
            $client->email = $request->input('email'),
            $client->phone_number = $request->input('phone_number'),
            $client->address = $request->input('address'),
            $client->birth_date = $request->input('birth_date')
        );
        $client->update($data);
        return redirect()->back()->with('success','Client has been updated');
	}
    // get action
    public function show($id)
    {
        $data['page_title'] = 'View News & Advice';
        $data['client'] = Client::findOrFail($id);
        return view('backend.pages.client.show', $data);
    }
	// delete action
	public function destroy($id)
	{
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->back()->with('success','Client has been deleted');
	}
}
