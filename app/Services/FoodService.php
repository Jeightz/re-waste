<?php

namespace App\Services;

use App\Model\UserAuth;
use App\Models\Food;

class FoodService{

public function donateFood(array $foodData,UserAuth $userAuth){
$data =Food::create(['name'=>$foodData['name'],
'quantity'=>$foodData['quantity'],
'category'=>$foodData['category'],
'expiry_date'=>$foodData['expiry_date'],
'status'=>$foodData['status'],
'donor_id'=>$userAuth->id,
]);
return $data;
}

public function DeleteFood(Food $food){
    return $food->delete();
}

public function UpdateFood(array $updateData, Food $foodToUpdate)
{
    if (!empty($updateData['name'])) {
        $foodToUpdate->name = $updateData['name'];
    }

    if (!empty($updateData['quantity'])) {
        $foodToUpdate->quantity = $updateData['quantity'];
    }

    if (!empty($updateData['category'])) {
        $foodToUpdate->category = $updateData['category'];
    }

    if (!empty($updateData['expiry_date'])) {
        $foodToUpdate->expiry_date = $updateData['expiry_date'];
    }

    if (!empty($updateData['status'])) {
        $foodToUpdate->status = $updateData['status'];
    }

    $foodToUpdate->save();

    return $foodToUpdate;
}

public function GetAllFoodData(){
    return Food::fetchAllFoodData();
}

public function getFoodDetailsByID(string $foodID){
    return Food::findFoodID($foodID);
}

public function getAllAvailableFood(){
return Food::getAvailableFood();
}

}

