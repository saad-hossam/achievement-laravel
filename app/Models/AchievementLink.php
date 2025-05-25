<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class AchievementLink extends Model
{
    use Translatable;

    protected $fillable = [
        'achievement_id',
        'url'
    ];

    public $translatedAttributes = ['title'];

    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
}
