<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PvLesson extends Model
{
    use HasFactory;

    protected $table = 'pv_lessons';

    protected $fillable = [
        'title',
    ];
}
