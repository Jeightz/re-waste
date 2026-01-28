<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class distribution_log extends Model
{
protected $primaryKey='distribution_log';
protected $keyType='string';
protected $incrementing=false;

protected $fillable=[
'food_id',
'distributed_user_id',
'distributed_at'];

protected static function boot(){
parent::boot();
static::creating(function($model){
if(empty($model->{$model->getKeyName()})){
$model->{$model->getKeyName()}=(string)\Str::uuid();
}
});
}
public  function distributed_user(){
return  $this->belongsTo(UserAuth::class,'distributed_user_id');
}

public function food(){
return $this->belongsTo(Food::class,'food_id');
}
}
