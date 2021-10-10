<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            // Add some items to the menu...
            $event->menu->add([
                'text' => 'Dashboard',
                'url' => '/dashboard',
            ]);
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text' => 'Home',
                'url' => '/home',
            ]);
            $event->menu->add([
                'text' => 'Status Pesanan',
                'url' => '/status-pesan',
            ]);
            $event->menu->add([
                'text' => 'Bayar Pesanan',
                'url' => '/proses-pesanan/bayar',
                'can'=>''
            ]);
            $event->menu->add([
                'text' => 'Proses Pesanan',
                'url' => '/proses-pesanan',
                'can'=>''
            ]);
        });   
    }
}