<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\ {
	Modules\Post\Post,
	Modules\Doctor\DoctorSub,
	Modules\Client\Client,
	Modules\Service\SubService
};

class AdminController extends Controller
{
	// view.backend.pages.beranda.index
	public function index()
	{
		$data['page_title'] = 'Beranda';
		$data['post'] = Post::count();
		$data['subdoc'] = DoctorSub::count();
		$data['client'] = Client::count();
		$data['subserv'] = SubService::count();
		return view('backend.pages.beranda.index', $data);
	}

	public function setting()
	{
		$data['page_title'] = 'Setting';
		return view('backend.pages.setting.index', $data);
	}

    public function change_password_admin(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required|min:6',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
            ],[
            'current_password.required' => 'Old password is required',
            'current_password.min' => 'Old password needs to have at least 6 characters',
            'password.required' => 'Password is required',
            'password.min' => 'Password needs to have at least 6 characters',
            'password_confirmation.required' => 'Passwords do not match'
        ]);
        $current_password = \Auth::User()->password;           
        if(\Hash::check($request->input('current_password'), $current_password))
        {          
          $user_id = \Auth::User()->id;                       
          $user = User::find($user_id);
          $user->email = $request->input('email');
          $user->password = \Hash::make($request->input('password'));
          $user->save(); 
          return redirect()->back()->with('success','Password has been updated');
        }
        else
        {           
          return redirect()->back()->with('danger','Please enter correct current password');
        }  

    }
}
