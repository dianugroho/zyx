<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisteredEvent;
use App\Models\User;
use App\Models\OtpCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegenerateOtpRequest;
use Carbon\Carbon;


class RegenerateOtpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegenerateOtpRequest $request)
    {

        $currentDateTime = Carbon::now();
        $user = User::firstWhere('email', $request->email);
        if ($user === null) {
            $response = ['response_code' => '01', 'response_message' => 'Email tidak terdaftar'];
        } else {
            $otpCode = OtpCode::firstWhere('user_id', $user->id);
            $otpCode->otp_code = rand(100000, 999999);
            $otpCode->valid_until = $currentDateTime->addMinute(5);
            $otpCode->save();

            // Send $user or whatever you want to Mail
            $sender = 'example@mail.com';
            UserRegisteredEvent::dispatch($user, $otpCode, $sender);

            $response = ['response_code' => '00', 'response_message' => 'Silahkan cek email', 'data' => ['user' => $user]];
        }

        return response()->json($response, 200);
    }
}
