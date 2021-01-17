<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = Auth::attempt($credentials)) {
            // Authentication failed
            $response = ['response_code' => '01', 'response_message' => 'Email atau password yang Anda masukan tidak sesuai'];
        } else {
            $user = User::where('email', $request->email)->first();
            if($user->email_verified_at === null) {
                $response = ['response_code' => '01', 'response_message' => 'Akun Anda belum diverifikasi'];
            } else {
                $response = ['response_code' => '00', 'response_message' => 'Verifikasi berhasil', 'data' => [['token' => $token], ['user' => $user]]];
            }
        }

        return $response;
    }
}
