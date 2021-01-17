<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\UpdatePasswordRequest;


class UpdatePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdatePasswordRequest $request)
    {
        $user = User::firstWhere('email', $request->email);
        if ($user === null) {
            $response = ['response_code' => '01', 'response_message' => 'Email tidak terdaftar'];
        } else {
            $user->password = Hash::make($request->password);
            $user->save();
            $response = ['response_code' => '00', 'response_message' => 'Password berhasil dirubah', 'data' => ['user' => $user]];
        }

        return response()->json($response, 200);
    }
}
