<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    protected $fillable = ['name', 'desc', 'status', 'type_devices_id', 'computers_id'];
}
