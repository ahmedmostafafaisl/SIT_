<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
 public function register(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone'=>'required'
        ]);

        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone'=>$request->phone,
        ]);

        $token = $user->createToken('SIT')->accessToken;

        return response()->json(['token' => $token], 200);
    }


    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }


    }
    protected  function authenticated(){
            Auth::logoutOtherDevices(request('password'));
        }

    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
