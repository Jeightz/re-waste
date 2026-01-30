<?php

namespace App\Console\Commands;
use App\Services\FoodDistributedService;
use Illuminate\Console\Command;

class ProcessDistributedFood extends Command
{

    protected $signature = 'app:process-distributed-food;';
    protected $description = 'process the distributed food';
    private FoodDistributedService $service;

public function __construct(FoodDistributedService $service){
        $this->service=$service;
        parent::__construct();
}
    public function handle()
    {
        $this->service->process();
        $this->info("successfully update the distributed-food");
    }


}
