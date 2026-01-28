<?php

namespace App\Policies;

use App\Models\Food;
use App\Models\UserInfo;
class FoodPolicy
{
public  function canEditFoodDetails(UserInfo $role){
return $result=$role->role=='admin'|| $role->role=='donor';
}
public function canDonateFood(UserInfo $role){
return $result=$role->role=='donor';
}
public function canDeleteFood(UserInfo $role){
return $result=$role->role=='admin'||$role->role=='donor';
}

public function canReserveFood(UserInfo $role){
return $result=$role->role=="redistributer";
}

public function canCancelReserve(UserInfo $role){
return $result=$role->role=='redistributer';
}

}
