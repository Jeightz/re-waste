<?php

namespace App\Policies;

use App\Models\UserAuth;
use Illuminate\Auth\Access\Response;

class UserAuthPolicy
{

/**
 *determine if the username is valid to register
 */

public static function isUsernameValid(string $username){
$checkusername=UserAuth::findUsername($username);

if($checkusername == null){
return false;
}
return true;
}


}
