<?php

namespace App\Policies;

use App\Models\Food;
use App\Models\UserAuth;
use App\Models\UserInfo;
use App\Models\Reserve;

use Illuminate\Support\Facades\Auth;
class FoodPolicy
{
public   function canUpdateFoodDetails(UserInfo $role){
return $role->info?->role==='admin'|| $role->info?->role==='donor';
}
public function canDonateFood(UserInfo $role){
return $role->info?->role==='donor';
}
public function canDeleteFood(UserInfo $role){
return $role->info?->role==='admin'||$role->info?->role=='donor';
}

public function canReserveFood(UserInfo $role,Food $food){
return $role->info?->role==="redistributer" && $food->status ==="available";
}


public function canCancelReserve(Reserve $reserve)
{
return Auth::user()->info?->role === 'redistributer'
&& $reserve->user_id === Auth::user()->info?->id;
}
public function isUserFoodDonated(UserAuth $user,Food $food){
    return $food->donor_id === $user->info?->id;
}

}
