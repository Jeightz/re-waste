<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class FoodUpdateServiceRequest extends FormRequest{



public function authorization():bool{
return true;
}
public function rules(): array
{
    return [
        'name' => 'sometimes|string|max:255',
        'quantity' => 'sometimes|integer|min:1',
        'category' => 'sometimes|string|in:fruits,vegetables,grains,protein foods,dairy',
        'expiry_date' => 'sometimes|date|after:today',
        'status' => 'sometimes|string|in:available,reserve,distributed,expired',
        'donor_id'=>'sometimes|string|uuid'
    ];
}

}
