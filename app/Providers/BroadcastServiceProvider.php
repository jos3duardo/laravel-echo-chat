<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');

        Broadcast::channel('room.{roomId}', function ($user, $roomId) {
            if ($user->canJoinRoom($roomId)) {
                return ['id' => $user->id, 'name' => $user->name];
            }
        });

    }
}
