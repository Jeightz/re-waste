<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserAuthServiceRequest;
use App\Models\UserAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserAuthController extends Controller
{
public function login(UserAuthServiceRequest $request){
$credentials=$request->validated();

$user=UserAuth::where('username',$credentials['username'])->first();

if(!$user|| Hash::check($credentials['password'],$user->password())){
    return back()->withErrors(['username' => 'Invalid credentials']);
}
Auth::login($user);


}

public function logout(){
Auth::logout();

}

}
