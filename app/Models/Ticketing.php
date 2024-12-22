<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticketing extends Model
{
    protected $table = 'ticketings';
    protected $guarded = [];
    protected $fillable = ['title', 'description', 'last_date', 'status', 'priority', 'assign_to', 'created_by'];
}
