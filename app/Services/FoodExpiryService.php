<?php
namespace App\Services;

use App\Models\Food;
use App\Models\waste_log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FoodExpiryService
{
    public function processExpiredFood(): void
    {
        DB::transaction(function () {

            $expiredFoods = Food::where('expiry_date', '<', Carbon::today())
                ->where('status', '!=', 'expired')
                ->get();

            foreach ($expiredFoods as $food) {

                waste_log::create([
                    'food_id'     => $food->id,
                    'expired_at'  => $food->expiry_date,
                    'quantity_waste' => $food->quantity,
                ]);

$food->update(['status'=>'expired']);
            }
        });
    }
}
