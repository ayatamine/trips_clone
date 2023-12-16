<?php

namespace App\Models;

use App\Models\PaymentCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitorNotifications extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function paymentCard(){
        return $this->hasOne(PaymentCard::class);
    }
}
