<?php

namespace App\Providers;

use App\Models\Appartement;
use App\Models\Ferma;
use App\Models\LocalCommercial;
use App\Models\Maison;
use App\Models\Terrain;
use App\Models\Villa;
use App\Observers\AppartementObserver;
use App\Observers\FermaObserver;
use App\Observers\LocalCommercialObserver;
use App\Observers\MaisonObserver;
use App\Observers\TerrainObserver;
use App\Observers\VillaObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Appartement::observe(AppartementObserver::class);
        Terrain::observe(TerrainObserver::class);
        Maison::observe(MaisonObserver::class);
        LocalCommercial::observe(LocalCommercialObserver::class);
        Villa::observe(VillaObserver::class);
        Ferma::observe(FermaObserver::class);
    }
}
