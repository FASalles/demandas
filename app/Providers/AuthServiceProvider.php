<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Silber\Bouncer\BouncerFacade as Bouncer;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Bouncer::allow('admin')
            ->to([
                'tools:show', 'tools:update', 'tools:delete',
                'user:show', 'user:update', 'user:delete',
                'system:show', 'system:update', 'system:delete',
                'sector:show', 'sector:update', 'sector:delete',
                'demand:show', 'demand:update', 'demand:delete'
            ]);

        Bouncer::allow('editor')
            ->to([
                'user:show', 'user:update', 'user:delete',
                'system:show', 'system:update', 'system:delete',
                'sector:show', 'sector:update', 'sector:delete',
                'demand:show', 'demand:update', 'demand:delete'
            ]);

        Bouncer::allow('visitor')
            ->to([
                'user:show', 'user:update',
                'system:show', 'system:update',
                'sector:show', 'sector:update',
                'demand:show', 'demand:update'
            ]);
    }
}
