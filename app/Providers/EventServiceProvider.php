<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    // public function __construct()
    // {
    //     $this->middleware('can:Modulo_PerfildeUsuario.usuarios.show')->only('show');
    // }
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
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
        Event::listen(BuildingMenu::class, function (BuildingMenu $event){
            $usuario = User::where('id', Auth::user()->id)->first();
            $event->menu->addAfter('header', [
                'key' => 'account_settings',
                'text' => $usuario->username,
                'icon' => 'fas fa-fw fa-user',
                'url' => '/admin/usuarios/' . $usuario->id,
                'can'  => 'Modulo_PerfildeUsuario.usuarios.show',
                'active' => false,
            ]);

        });
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