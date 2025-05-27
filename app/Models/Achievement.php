<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Achievement extends Model
{
    use Translatable;

    protected $fillable = [
        'image_layout',
        'department_id',
        'created_by',
        'updated_by',
        'status',
    ];

    public $translatedAttributes = ['title', 'desc'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function media()
    {
        return $this->hasMany(AchievementMedia::class);
    }

    public function links()
    {
        return $this->hasMany(AchievementLink::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
