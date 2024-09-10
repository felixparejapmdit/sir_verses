<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PvInfo extends Model
{
    use HasFactory;

    protected $table = 'pv_infos';

    protected $fillable = [
        'pv_event_id',
        'pv_event_type_id',
        'created_by',
        'event_date',
        'event_time',
        'event_location',
        'district',
        'locale',
        'is_locked',
    ];

    public function pvEvent()
    {
        return $this->belongsTo(PvEvent::class, 'pv_event_id', 'id');
    }

    public function pvEventType()
    {
        return $this->belongsTo(PvEventType::class, 'pv_event_type_id', 'id');
    }
}
