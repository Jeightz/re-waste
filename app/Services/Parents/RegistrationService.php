<?php

namespace App\Services\Parents;
use Illuminate\Database\Eloquent\Model;

abstract class RegistrationService{

abstract protected function createRecord(array $data):Model;

abstract protected function processRecord(array $data):array;


public function register(array $data){
    $preparedData=$this->processRecord($data);
    return $this->createRecord($preparedData);
}

}
