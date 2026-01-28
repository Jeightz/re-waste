<?php
namespace App\Services;
use App\Models\UserInfo;
use App\Models\UserAuth;
use Carbon\Carbon;
class UserInfoService{

public function Register(array $data,UserAuth $userAuth){
return UserInfo::create(['userinfo_id'=>$userAuth->id,
'name'=>$data['name'],
'email'=>$data['email'],
'role'=>$data['role'],
'created_at'=>Carbon::today()]);
}
}

