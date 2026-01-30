<?php
namespace App\Services;
use App\Models\UserInfo;
use App\Models\UserAuth;
use Carbon\Carbon;
use App\Services\Parents\RegistrationService;
use Illuminate\Database\Eloquent\Model;
class UserInfoService extends RegistrationService{



protected function processRecord(array $data):array{
    return ['userinfo_id'=>$data['id'],
    'name'=>$data['name'],
    'email'=>$data['email'],
    'role'=>$data['role'],
    'created_at'=>Carbon::today()];
}

protected function createRecord(array $data):Model{
    return UserInfo::create($data);
}
}

