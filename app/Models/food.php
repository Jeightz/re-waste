<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Food extends Model
{
protected $primaryKey='food_id';
protected $keyType='string';
public $incrementing='false';
    protected $fillable=[
        'name'
        ,'quantity'
        ,'category'
        ,'expiry_date'
        ,'status'
        ,'donor_id'
        ,'created_at'
        ,'updated_at'];

protected static function boot(){
    parent::boot();
    static::creating(function($model){
            if(empty($model->{$model->getKetName()})){
            $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });

}


    public function donor(){
        return $this->belongsTo(UserAuth::class,'donor_id');
    }

public static function findFoodID(string $foodId){
return self::find($foodId);
}

public static function fetchAllFoodData(){
return self::all();
}

public static function getAvailableFood(){
return self::where('status','available')->get();
}
}
