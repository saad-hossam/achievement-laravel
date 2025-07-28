<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use Translatable ;
    use HasFactory;
    public $translatedAttributes=['title'];
    protected $fillable =[
        'title',
        'image',
       'status',
    ];

    // protected static function boot()
    // {
    //     static::deleting(function ($department) {
    //         $department->translations()->delete();
    //     });
    // }
    public function translations()
{
    return $this->hasMany(SliderTranslation::class);
}
public function scopeActive($query)
    {
        return $query->where('status', 'active');

    }

}
