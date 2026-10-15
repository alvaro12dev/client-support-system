<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class TicketHistory extends Model
{

public function ticket()
{
    return $this->belongsTo(Ticket::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}
