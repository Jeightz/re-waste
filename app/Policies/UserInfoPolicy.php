<?php

namespace App\Policies;


use App\Models\UserInfo;
use Illuminate\Auth\Access\Response;

class UserInfoPolicy
{
public function isEmailValid(string $email){
$checkemail=UserInfo::findbyEmail($email);

if($checkemail==null){
return false;
}
return true;
}

public function isPassAndConfirmPassSame(string $pass,string $confirmPass){
return $result=$pass===$confirmPass;
}


}
