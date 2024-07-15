<?php

namespace App\Events;

use App\Models\Users;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $user;

    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        // Actualizar el campo 'users' en la tabla 'logins'
        $login = \App\Models\Logins::where('users', $this->user->number_identification)->first();
        if ($login) {
            $login->update([
                'users' => $this->user->number_identification,
                // Aquí puedes incluir otros campos que desees actualizar en 'logins'
            ]);
        }
    }
}
