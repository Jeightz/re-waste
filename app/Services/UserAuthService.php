<?php

namespace App\Services;

use App\Models\UserAuth;
use App\Services\Parents\RegistrationService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class UserAuthService extends RegistrationService{



protected function processRecord(array $data):array{
return $data=['username'=>$data['username'],
'password'=>Hash::make($data['password'])];
}

protected function createRecord(array $data):Model
{
return UserAuth::create($data);
}

}
