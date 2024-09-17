<?php

namespace App\Providers;

use App\Models\ClubUserAffiliation;
use App\Models\Commission;
use App\Policies\ClubUserAffiliationPolicy;
use App\Policies\CommissionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Meeting;
use App\Policies\MeetingPolicy;

class AuthServiceProvider extends ServiceProvider
{
protected $policies = [
    Meeting::class => MeetingPolicy::class,
    Commission::class => CommissionPolicy::class,
    ClubUserAffiliation::class => ClubUserAffiliationPolicy::class,
];

public function boot()
{
$this->registerPolicies();
}
}
