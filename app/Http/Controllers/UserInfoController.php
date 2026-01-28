<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UserAuth;
use App\Models\UserInfo;
class UserInfoController extends Controller
{


public function signup(Request $request){
$data = $request->validate(['username'=>'required|string',
'password'=>'required|string|min:6',
'name'=>'required|string',
'email'=>'required|string',
'role'=>'required|string|in:admin,donors,redistributer']);

$UserAuth=UserAuth::create([
'username'=>$data['username'],
'password'=>$data['password']
]);


}

}
