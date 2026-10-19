<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Category;
use App\Models\Comment;
use App\Models\TicketHistory;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'customer_id',
        'category_id',
        'assigned_to',
    ];
    
  public function customer()
{
    return $this->belongsTo(Customer::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}

public function assignedUser()
{
    return $this->belongsTo(User::class, 'assigned_to');
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function histories()
{
    return $this->hasMany(TicketHistory::class);
}
}
