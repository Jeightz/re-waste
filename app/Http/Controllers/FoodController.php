<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodAddServiceRequest;
use App\Http\Requests\FoodUpdateServiceRequest;
use App\Policies\FoodPolicy;
use App\Services\FoodService;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{

public function __construct(FoodService $foodService){
    $this->foodservice=$foodService;
}
public function addFood(FoodAddServiceRequest $foodAddServiceRequest){
    $creds=$foodAddServiceRequest->validated();
    $userRole=Auth::user()->role;
    $foodpolicy=new FoodPolicy();
    $checkrole=$foodpolicy->canDonateFood($userRole);

    if(!$checkrole){
    return back()->withErrors(['Role'=>'You Are not A Donator Role You Cannot Input Data Insert']);
    }

$this->foodservice->donateFood($creds);

}


public function updateFood(FoodUpdateServiceRequest $request,string $food){
    $creds=$request->validated();

    $foodData=$this->foodservice->getFoodDetailsByID($food);
    $user=Auth::user();

    $this->authorize('canDonateFood',$user);
    $this->authorize('isUserFoodDonated',$foodData);

    return $this->foodservice->UpdateFood($creds,$foodData);
}

public function deleteFood(string $foodID){
$user =Auth::user();
$food=$this->foodservice->getFoodDetailsByID($foodID);
$this->authorize('canDeleteFood',$user);

return $this->foodservice->DeleteFood($food);

}
}
