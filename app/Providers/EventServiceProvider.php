<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\AddDownload;
use App\Events\AddSytemGroupRelationToReferences;
use App\Listeners\SaveProductLevelesRelation;
use App\Listeners\SaveSystemGroupsRelation;
use App\Listeners\SaveSystemGroupsRefrencesRelation;



class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AddDownload::class => [
            SaveProductLevelesRelation::class,
            SaveSystemGroupsRelation::class,
        ],
        AddSytemGroupRelationToReferences::class => [
            SaveSystemGroupsRefrencesRelation::class,
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
