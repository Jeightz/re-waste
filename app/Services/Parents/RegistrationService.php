<?php

namespace App\Services\Parents;
use Illuminate\Database\Eloquent\Model;

abstract class RegistrationService{

/**
 *Create a account in the database
 * @param array $data
 * @return Model
 */
abstract protected function createRecord(array $data):Model;

/**
 *process the data for prepared for inserting to database
* @param array $data
 * @return Model
 */
abstract protected function processRecord(array $data):array;

/**
 *Register the user by processing the data and inserting it to the database
 * @param array $data
 * @return Model
 */
public function register(array $data){
$preparedData=$this->processRecord($data);
return $this->createRecord($preparedData);
}
}
