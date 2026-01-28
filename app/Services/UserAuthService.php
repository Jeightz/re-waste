<?php

namespace App\Services;

use App\Models\UserAuth;
use Illuminate\Support\Facades\Hash;

class UserAuthService{

public function Register(array $data){
return UserAuth::create(['username'=>$data['username'],
'password'=>Hash::make($data['password'])]);
}


}
