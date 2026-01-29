<?php

namespace App\Console\Commands;

use App\Services\FoodExpiryService;
use Illuminate\Console\Command;

class processExpiredFood extends Command
{

    protected $signature = 'app:process-expired-food';
    protected $description = 'Move Expired food to waste_log';
    private FoodExpiryService $service;

    public function __construct(FoodExpiryService $service)
    {
        $this->service = $service;
        parent::__construct();
    }
    public function handle()
    {
        $this->service->processExpiredFood();
        $this->info('Successfuly tranfer of expired Food');
    }
}
