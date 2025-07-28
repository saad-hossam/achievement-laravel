<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Department extends Model
{
    use Translatable ;
    use HasFactory;
    // use TranslatableContract;
    public $translatedAttributes=['name'];
    protected $fillable = [
        'name',
        'status',
        'image',
        // 'translations' // Assuming this is the pivot table name
    ];

    public function translations()
    {
        return $this->hasMany(DepartmentTranslation::class);
    }


    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }


    public function scopeActive($query)
    {
        return $query->where('status', 'active');

    }

}
