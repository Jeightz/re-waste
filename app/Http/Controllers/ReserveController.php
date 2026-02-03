<?php

namespace App\Http\Controllers;

use App\Services\FoodService;
use App\Services\ReserveService;
use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{

public function reserveFood(string $foodId){
$food=Food::findFoodID('foodId');
$this->authorize('canReserveFood',$food);
$reserve = new ReserveService();
$user=Auth::user();

return $reserve->AddReserveFood($food,$user);

}

public function CancelReserve(string $reserveID){
$reserve=Reserve::findFoodReserveByFoodID($reserveID);
$this->authorize('canCancelReserve',)

}

public function UpdateReserve(){

}
}
