<?php

namespace App\Policies;


use App\Models\UserInfo;
use Illuminate\Auth\Access\Response;

class UserInfoPolicy
{
public static function isEmailValid(string $email){
$checkemail=UserInfo::findbyEmail($email);

if($checkemail==null){
return false;
}
return true;
}



}
