<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Company;
use App\Models\CompliantHistory;
use App\Models\CompliantUser;
use App\Models\Documents;
use App\Models\Oportunity;
use App\Models\Product;
use App\Models\Topic;
use App\Models\TopicComments;
use App\Models\TopicEvaluate;
use App\Models\TopicFavorite;
use App\Models\User;
use App\Observers\ClientObserver;
use App\Observers\CompanyObserver;
use App\Observers\CompliantHistoryObserver;
use App\Observers\CompliantUsersObserver;
use App\Observers\DocumentsObserver;
use App\Observers\OportunityObserver;
use App\Observers\ProductObserver;
use App\Observers\TopicCommentsObserver;
use App\Observers\TopicsEvaluateObserver;
use App\Observers\TopicsFavoriteObserver;
use App\Observers\TopicsObserver;
use App\Observers\UsersObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UsersObserver::class);
        Product::observe(ProductObserver::class);
        Client::observe(ClientObserver::class);
        Oportunity::observe(OportunityObserver::class);
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
