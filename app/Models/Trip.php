<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable=[
        'from','to','direction_type','departure_time','visitor_notifications_id','type','departure_date','return_date','adults_count',
        'child_count','infant_count','special_needs_count','ticket_type','price'
    ];
}
