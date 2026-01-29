<?php

namespace App\Policies;

use App\Models\Food;
use App\Models\UserAuth;
use App\Models\UserInfo;
class FoodPolicy
{
public  function canUpdateFoodDetails(UserInfo $role){
return $role->role==='admin'|| $role->role==='donor';
}
public function canDonateFood(UserInfo $role){
return $role->role==='donor';
}
public function canDeleteFood(UserInfo $role){
return $role->role==='admin'||$role->role=='donor';
}

public function canReserveFood(UserInfo $role){
return $role->role==="redistributer";
}

public function canCancelReserve(UserInfo $role){
return $role->role==='redistributer';
}

public function isUserFoodDonated(UserAuth $user,Food $food){
    return $food->donor_id === $user->id;
}

}
