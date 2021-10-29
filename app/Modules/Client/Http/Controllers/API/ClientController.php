<?php

namespace App\Modules\Client\Http\Controllers\API;

use Illuminate\Http\Request;
use App\ {
    Http\Resources\Client\ClientResource,
    Http\Controllers\Controller,
    Modules\Client\Client
};

class ClientController extends Controller
{
	// 
	public function index()
	{
        return Client::all();
	}
    // 
    public function show(Client $client)
    {
        return new ClientResource($client);
    }
    // 
    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
            'gender' => 'required',
            'phone_number' => 'required',
            'birth_date' => 'required'
        ]);

        $client = Client::find($id);
        if ($request->file('profile_picture') === null) {
            $path = 'images/noimage.jpg';
        } else {
            $fileName = $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')
                    ->move(base_path() . '/public/img/bamed/client/', $fileName);
            $path = '/img/bamed/client/' . $fileName;
            $client->profile_picture = $path;
        }
        if ($request->file('bg_member') === null) {
            $path = 'images/noimage.jpg';
        } else {
            $fileName = $request->file('bg_member')->getClientOriginalName();
            $request->file('bg_member')
                    ->move(base_path() . '/public/img/bamed/client/bg_member/', $fileName);
            $path = '/img/bamed/client/bg_member/' . $fileName;
            $client->bg_member = $path;
        }

        $data = array(
            // $client->profile_picture = $path,
            $client->profile_picture = $request->input('profile_picture'),
            $client->bg_member = $request->input('bg_member'),
            $client->name = $request->input('name'),
            $client->gender = $request->input('gender'),
            $client->email = $request->input('email'),
            $client->phone_number = $request->input('phone_number'),
            $client->address = $request->input('address'),
            $client->birth_date = $request->input('birth_date')
        );
        $client->update($data);
        return response()->json(['Edit Client Berhasil' => true]);
    }
}
