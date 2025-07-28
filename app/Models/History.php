<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use Translatable ;
    use HasFactory;
    public $translatedAttributes=['name','description'];
    protected $fillable =[
        'name',
        'description',
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
    return $this->hasMany(HistoryTranslation::class);
}
public function scopeActive($query)
    {
        return $query->where('status', 'active');

    }



}
