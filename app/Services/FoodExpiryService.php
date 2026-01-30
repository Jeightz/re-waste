<?php
namespace App\Services;

use App\Models\Food;
use App\Models\waste_log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\Parents\ScheduleProcessService;
use Illuminate\Database\Eloquent\Collection;

class FoodExpiryService extends ScheduleProcessService
{


protected function getItemsToProcess():Collection{
    return Food::where('expiry_date', '<', Carbon::today())
                ->where('status', '!=', 'expired')
                ->get();

    }

    protected function createRecordLog(array $data):void{
        waste_log::create($data);
    }

    protected function processData(array $data):array{
return[             'food_id'     => $data['food_id'],
                    'expired_at'  => $data['expired_at'],
                    'quantity_waste' => $data['quantity_waste'],
                ];
    }




}
