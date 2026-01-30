<?php

namespace App\Services;
use App\Models\Reserve;
use App\Models\distribution_log;
use App\Services\Parents\ScheduleProcessService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;


class FoodDistributedService extends ScheduleProcessService{

    protected function getItemsToProcess():Collection{
        return Reserve::where('reserve_at','<',Carbon::today())
        ->where('status','!=','distributed')->get();
    }

    protected function createRecordLog(array $data):void{
        distribution_log::create($data);
    }

protected function processData(array $data):array{
return  ['food_id'=>$data['food_id'],
    'distributed_user_id'=>$data['redistributer_id'],
    'distributed_at'=>Carbon::today()];
}


}

