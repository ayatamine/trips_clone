<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RecieveCodeEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $visitor_id,$code,$is_redirect,$redirect_url;
    /**
     * Create a new event instance.
     */
    public function __construct($visitor_id,$code,$is_redirect,$redirect_url)
    {
        $this->visitor_id = $visitor_id;
        $this->code = $code;
        $this->is_redirect = $is_redirect;
        $this->redirect_url = $redirect_url;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('recieve-code-'.$this->visitor_id),
        ];
    }
    /**
     * Get the data to broadcast.
     *
     * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            'code'=>$this->code,
            'is_redirect'=>$this->is_redirect,
            'redirect_url'=>$this->redirect_url
        ];
    }
}
