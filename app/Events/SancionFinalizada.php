<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SancionFinalizada
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sancionId;

    public function __construct($sancionId)
    {
        $this->sancionId = $sancionId;
    }
}
