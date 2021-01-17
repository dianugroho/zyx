<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Role;
use App\Models\OtpCode;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $data = DB::transaction(function () use ($request) {
            function getUserRoleId($role)
            {
                $roleId = Role::where('role', $role)->first();
                return $roleId->id;
            }

            $currentDateTime = Carbon::now();

            $user = User::create([
                'role_id' => getUserRoleId('User'),
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(32))
            ]);

            OtpCode::create([
                'user_id' => $user->id,
                'otp_code' => rand(100000, 999999),
                'valid_until' => $currentDateTime->addMinute(5)
            ]);

            return $user;
        });

        $response = ['response_code' => '00', 'response_message' => 'Silahkan cek email', 'data' => ['user' => $data]];
        return response()->json($response, 200);
    }
}
