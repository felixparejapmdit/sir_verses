<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PvEvent;

class PvEventType extends Model
{
    use HasFactory;

    protected $table = 'pv_event_types';

    protected $fillable = [
        'pv_event_id',
        'name',
    ];

    public function pvEvent()
    {
        return $this->belongsTo(PvEvent::class, 'pv_event_id', 'id');
    }
}
