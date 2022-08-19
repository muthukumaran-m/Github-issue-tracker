<?php

namespace App\Providers;

use App\Listeners\IssueDeletedInGit;
use App\Listeners\IssueEditedInGit;
use App\Listeners\IssuChangedInGit;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        'github-webhooks::issues.opened' => [
            IssuChangedInGit::class,
        ],
        'github-webhooks::issues.edited' => [
            IssuChangedInGit::class,
        ],
        'github-webhooks::issues.closed' => [
            IssuChangedInGit::class,
        ],
        'github-webhooks::issues.deleted' => [
            IssueDeletedInGit::class,
        ],

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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
