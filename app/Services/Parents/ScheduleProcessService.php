<?php

namespace App\Services\Parents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

use Carbon\Carbon;
abstract class ScheduleProcessService{

abstract protected function getItemsToProcess():Collection;

abstract protected function createRecordLog(array $data):void;


abstract protected function processData(array $data):array;
public function process(){
  DB::transaction(function (){
    $dataItems=$this->getItemsToProcess();

    foreach($dataItems as $items){
        $data =$this->processData($items);
        $this->createRecordLog($data);
        $items->update(['status'=>'recieve']);
    }
    });
}

}
