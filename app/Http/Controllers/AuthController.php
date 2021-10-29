<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use App\Mail\RegisMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Modules\Client\Client;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:6,25'
        ]);
        $client = new Client($request->all());
        // Mail::to($client->email)->send(new RegisMail($client));
        $client->password = bcrypt($request->password);
        $client->save();

        return response()->json(['Berhasil Registrasi' => true]);
    }

    public function registerConfirm(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|between:6,25'
        ]);
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'), 
            'password' => $request->password
        ];
        Mail::send('emails.regis', $data, function($msg) use ($data){
            $msg->from('info@bamedskincare.co.id', 'Registrasi Konfirmasi');
            $msg->cc('info@bamedskincare.co.id', 'Info Bamed Online');
            $msg->cc('kingpoxxx@gmail.com', 'Developer Bamed Online');
            $msg->to($data['email']);
            $msg->subject($data['password']);
        });
        $client = new Client();
        //generate a password for the new users
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = bcrypt($request->password);
        $client->save();
        // User::sendWelcomeEmail($user);
        return response()->json(['Berhasil Registrasi, harap cek email anda' => true]);
    }

    public function loginClient(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|between:6,25'
        ]);
        $client = Client::where('email', $request->email)->first(); // Get one email input
        $exist_email = Client::where('email', $request->email)->exists(); // // Check if exist
        $client_password = Hash::check($request->password, $client->password);
        if (!$exist_email) {
            return response()->json(['email' => ['Email Belum Terdaftar!']]); // Email Tidak ada
        }
        if (!$client_password) {
            return response()->json([
                    'email' => ['Password Tidak Sesuai!']
                    ]); // Email Tidak ada
        }
        if($client && $client_password) {
            $client->save();
            return response()->json([
                    'Check client id :',
                    'client_id' => $client->id
                    ]);
        }
        return response()->json(['email' => ['Email & Password Client Tidak Sesuai!']], 422);
    }
    // Client
    public function change_password(Request $request)
    {
        $client = Client::where('email', $request->email)->first(); // Get one email input
        if (!(Hash::check($request->get('current-password'), $client->password))) {
            return response()->json(
                    "Password Tidak Sesuai. Coba Lagi."
                    );
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Password lama sama Baru Sama
            return response()->json("Error. Tolong Ganti Password Yang Beda.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|between:6,25',
        ]);
 
        //$client = new Client();
        $client->password = bcrypt($request->get('new-password'));
        $client->save();
        return response()->json("Password Berhasil Diubah.");
    }

    public function reset_password(Request $request)
    {
        $client = Client::where('email', $request->email)->first(); // Get one email input
        if (empty($client)) {
            return response()->json("Client '$email' not found");
        }
        if ($client) {
            $password = str_random(6);
            $data = ['email' => $client->email, 'password' => $password];
            Mail::send('emails.reset_pass', $data, function($msg) use ($data){
                $msg->from('info@bamedskincare.co.id', 'Reset Password');
                $msg->cc('info@bamedskincare.co.id', 'Info Bamed Online');
                $msg->cc('kingpoxxx@gmail.com', 'Developer Bamed Online');
                $msg->to($data['email']);
                $msg->subject($data['password']);
            });
            $client->password = bcrypt($password);
            $client->save();
            return response()->json("Check Mail & Your password: $password");
        } 
    }

    public function loginSosial(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $client = Client::where('email', $request->email)->first();
        $client->save();

        return response()->json($client);
    }
    // User ----------------------------------
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|between:6,25'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)) {
            // generate new api token
            $user->api_token = str_random(60);
            $user->save();

            return response()
                ->json([
                    'authenticated' => true,
                    'api_token' => $user->api_token,
                    'user_id' => $user->id
                ]);
        }

        return response()->json(['email' => ['Email & Password User Tidak Sesuai!']], 422);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->api_token = null;
        $user->save();

        return response()->json(['Logout Berhasil' => true]);
    }
}
