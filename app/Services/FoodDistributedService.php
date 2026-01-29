<?php

namespace App\Services;
use App\Models\Reserve;
use App\Models\distribution_log;
use App\Models\Food;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class FoodDistributedService{

public function processFoodDistribute(){
    DB::transaction(function (){
    $distributedFood=Reserve::where('reserve_at','<',Carbon::today())
    ->where('status','!=','distributed')->get();

    foreach($distributedFood as $food){
    distribution_log::create(['food_id'=>$food->food_id,
    'distributed_user_id'=>$food->redistributer_id,
    'distributed_at'=>Carbon::today()
    ]);

    $food->update(['status'=>'distributed']);
    }


    });
}





}

