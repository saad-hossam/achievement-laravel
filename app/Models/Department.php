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

    // protected static function boot()
    // {
    //     static::deleting(function ($department) {
    //         $department->translations()->delete();
    //     });
    // }
    public function translations()
    {
        return $this->hasMany(DepartmentTranslation::class);
    }

    // Department.php

public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 'active');

    }

}
