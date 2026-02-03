<?php

namespace App\Providers;
use App\Policies\UserAuthPolicy;
use App\Policies\UserInfoPolicy;
use App\Models\UserAuth;
use App\Models\UserInfo;


use App\Models\Food;
use App\Policies\FoodPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Food::class => FoodPolicy::class,
        UserAuth::class=>UserAuthPolicy::class,
        UserInfo::class=>UserInfoPolicy::class,
];

    public function boot(): void
    {
$this->registerPolicies();
    }
}
