<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UserAuthServiceRequest extends FormRequest{

public function authorization():bool{
return true;
}
public function rules():array{
return['username'=>['required','string'],
'password'=>'required|string|min:6'
];
}


}
