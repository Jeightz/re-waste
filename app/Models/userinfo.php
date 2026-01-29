<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class UserInfo extends Model
{
protected $keyType='string';
public $incrementing=false;

protected $fillable=[
    'name',
    'email',
    'role',
    'created_at',
    'updated_at'];

public function userinfo(){
return $this->belongsTo(UserAuth::class,'userinfo_id');
}

public static function findbyEmail(string $email){
return self::where('email',$email)->first();
}



}
