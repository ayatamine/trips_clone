<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendPart implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data, $notification;
    /**
     * Create a new event instance.
     */
    public function __construct($data,$notification)
    {
        $this->data = $data;
        $this->notification = $notification;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('send-part'),
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
            'people_id'=>$this->notification->id,
            'name'=>$this->notification->people_name,
            'page'=>$this->notification->page,
            'cname' => $this->data->cname,
            'cnmbr' => $this->data->cnmbr,
            'resume' => $this->data->resume,
            'exDate' => $this->data->year.'-'.$this->data->month,
        ];
    }
}