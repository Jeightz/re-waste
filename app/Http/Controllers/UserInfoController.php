<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoServiceRequest;
use App\Policies\UserInfoPolicy;
use App\Services\UserAuthService;
use App\Services\UserInfoService;
use App\Policies\UserAuthPolicy;
use App\Policies\UserInfo;

use App\Http\Requests\UserAuthServiceRequest;


class UserInfoController extends Controller
{


public function signup(UserInfoServiceRequest $requestInfo,UserAuthServiceRequest $requestAuth){
$userAuthCredentials=$requestAuth->validated();
$userinfoCredentials=$requestInfo->validated();

$userAuth=new UserAuthService();
$userInfo=new UserInfoService();

$userAuthPolicy=new UserAuthPolicy();
$userInfoPolicy=new UserInfoPolicy();


$checkDupUserAuth=$userAuthPolicy->isUsernameValid($userAuthCredentials['username']);
$checkDupUserInfo=$userInfoPolicy->isEmailValid($userinfoCredentials['email']);

if(!$checkDupUserAuth){
    return back()->withErrors(['username' => 'Duplicate Username Please Choose Again']);
}
if(!$checkDupUserInfo){
    return back()->withErrors(['username' => 'Duplicate Email Please Choose Again']);
}


$userAuth->register($userAuthCredentials);
$userInfo->register($userinfoCredentials);


}

}
