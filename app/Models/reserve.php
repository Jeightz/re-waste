<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Reserve extends Model
{

protected $primaryKey='reserve_id';
protected $keyType='string';
protected $incrementing=false;
protected $fillable=[
'status',
'reserve_at',
'food_id',
'redistributer_id',
'created_at',
'updated_at'];
protected static function boot(){
    parent::boot();
    static::creating(function($model){
    if(empty($model->{$model->getKeyName()})){
    $model->{$model->getKeyName()}=(string)\Str::uuid();}});
}

public function food(){
    return $this->belongsTo(Food::class,'food_id');
}

public function redistributer(){
return $this->belongsTo(UserAuth::class,'redistributer_id');
}
}
