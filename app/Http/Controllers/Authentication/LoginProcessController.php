<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;

class LoginProcessController extends Controller
{

    public function LoginAuthenticationPost(Request $request)
    {

        // dd($request->toArray());
        $validator = Validator::make($request->all(),
            [
                'densoUsername' => 'required',
                'densoPassword' => 'required',
            ], [
                'densoUsername.required' => 'Username Harus Di isikan',
                'densoPassword.required' => 'password Diharuskan']

        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 500,
                'message' => 'Username dan password harus diisi',
            ]);
        }

        $credentials = $request->only('densoUsername', 'densoPassword');

        $newCredential = [
            'username' => $request->densoUsername,
            'password' => $request->densoPassword,
        ];

        if (Auth::attempt($newCredential)) {
            // $request->session()->put($newCredential);
            return redirect()->route('dashboard');
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Email dan password tidak sesuai',
            ]);
        }
    }

    public function LogoutAuthenticationProcess(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}
