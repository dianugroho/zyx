<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerificationRequest;
use App\Models\OtpCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(VerificationRequest $request)
    {
        function verifyOtpCode($userId, $otp)
        {
            $otp = OtpCode::where(['user_id' => $userId, 'otp_code' => $otp])->first();
            return $otp;
        }

        $currentDateTime = Carbon::now();
        $optVerified = verifyOtpCode($request->userId, $request->otp);
        if ($optVerified === null) {
            $response = ['response_code' => '01', 'response_message' => 'Kode OTP tidak ditemukan'];
        } elseif ($optVerified->valid_until < $currentDateTime) {
            $response = ['response_code' => '01', 'response_message' => 'OTP sudah tidak berlaku, silahkan generate kembali'];
        } else {
            $response = DB::transaction(function () use ($request, $currentDateTime, $optVerified) {
                $user = User::where('id', $request->userId)->first();
                $user->email_verified_at = $currentDateTime;
                $user->save();

                $optVerified->otp_code = '';
                $optVerified->save();
                return ['response_code' => '00', 'response_message' => 'Verifikasi berhasil', 'data' => ['user' => $user]];
            });
        }

        return response()->json($response, 200);
    }
}
