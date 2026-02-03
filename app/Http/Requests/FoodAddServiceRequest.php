<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class FoodAddServiceRequest extends FormRequest{



public function authorization():bool{
return true;
}
public function rules(): array
{
    return [
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'category' => 'required|string|in:fruits,vegetables,grains,protein foods,dairy',
        'expiry_date' => 'required|date|after:today',
        'status' => 'required|string|in:available,reserve,distributed,expired',
        'donor_id'=>'required|string|uuid'
    ];
}

}
