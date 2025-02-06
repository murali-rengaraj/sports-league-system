<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'event_id', 'ticket_quantity', 'payment_status'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
