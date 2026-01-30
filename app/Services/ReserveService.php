<?php

namespace App\Services;
use App\Models\Reserve;
use App\Models\Food;
use Carbon\Carbon;
use App\Models\UserAuth;
class ReserveService{
public function updateReserveStatus(Reserve $reserveData){
    return $reserveData->update(['status'=>'recieve']);
}

public function AddReserveFood(Food $foodData,UserAuth $userAuth){
    return Reserve::create(['status'=>'waiting for pickup',
    'reserve_at'=>Carbon::today(),
    'food_id'=>$foodData->food_id,
    'redistributer_id'=>$userAuth->id]);
}
public function CancelReserveFood(Food $food,Reserve $reserve){
    $food->update(['status'=>'available']);
    return $reserve->delete();
}




}
