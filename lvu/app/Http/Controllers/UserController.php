<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at', 'desc')->get();
        return UserResource::collection($users);
    }

    public function create(Request $request){
        $user = User::create(['name' => $request->name]);
        return new UserResource($user);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        return new UserResource($user);
    }

    public function delete($id){
        User::destroy($id);
        return $id;
    }
}
