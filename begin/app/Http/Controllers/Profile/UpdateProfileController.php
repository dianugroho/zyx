<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateProfileRequest $request)
    {
        $userAuth = Auth::user();
        $userId = $userAuth->id;
        $user = User::firstWhere('id', $userAuth->id);

        $filePath = 'photos/users/profile/';
        $fileName = $userId . '.' . $request->photo->extension();
        $request->photo->storeAs($filePath, $fileName);

        $user->name = $request->name;
        $user->photo = $filePath . $fileName;

        $user->save();
        $response = ['response_code' => '00', 'response_message' => 'Profile berhasil dirubah', 'data' => ['user' => $user]];


        return response()->json($response, 200);
    }
}
