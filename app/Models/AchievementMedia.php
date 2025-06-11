<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievementMedia extends Model
{
    use HasFactory;
    protected $fillable = ['achievement_id', 'type', 'path','video_id'];

    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
}
