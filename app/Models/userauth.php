<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class UserAuth extends Model
{
protected $keyType='string';
public $incrementing=false;
protected $fillable=[
'username',
'password'];

public  function info(){
return $this->hasOne(UserInfo::class,'userinfo_id');
}

public static function findUsername(string $username){
return self::where('username',$username)->first();
}

protected static function boot(){
parent::boot();
static::creating(function($model){
if(empty($model->{$model->getKeyName()})){
$model->{$model->getKeyName()}=(string)\Str::uuid();
}
});
}



}
