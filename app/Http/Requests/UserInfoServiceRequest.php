<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class  UserInfoServiceRequest extends FormRequest{


public function authorization():bool{
return true;
}
public function rules():array{
return['userinfo_id'=>['required','uuid','string'],
'name'=>'required|string',
'email'=>'required|string',
'role'=>'required|string|in:admin,donor,redistributer'
];
}

}
