<?php

namespace App\Models;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use Translatable ;
    use HasFactory;
    // use TranslatableContract;
    public $translatedAttributes=['name','body','description'];
    protected $fillable = [
        'name','body','description','category_id','price','sale','status','image'
    ];

    // protected static function boot()
    // {
    //     static::deleting(function ($department) {
    //         $department->translations()->delete();
    //     });
    // }
    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'photoable');
    }

    public function scopeActive($query)
    {
        return $query->where('status','active');
    }

    // public function department()
    // {
    //     return $this->belongsTo(Department::class);
    // }



}
