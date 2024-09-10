<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PvEvent extends Model
{
    use HasFactory;

    protected $table = 'pv_events';

    protected $fillable = [
        'name',
    ];
}
