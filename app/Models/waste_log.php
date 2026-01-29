<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class waste_log extends Model
{
protected $primaryKey='waste_id';
protected $keyType='string';
public $incrementing=false;

protected $fillable=[
'food_id',
'expire_at',
'quantity_waste'
];

public function food(){
return $this->belongsTo(Food::class,'food_id');
}

protected static function boot(){
    parent::boot();
    static::creating(function($model){
    if(empty($model->{$model->geyKeyName()})){
    $model->{$model->getKeyName()=(string)\Str::uuid()};
    }

    });
}
}
