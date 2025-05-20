<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use Translatable ;
    use HasFactory;
    public $translatedAttributes=['name','description'];
    protected $fillable =[
        'name',
        'description',
        'image',
        'department_id',
        'images',
       'status',
    ];

  // Cast 'images' as an array to decode JSON automatically
  protected $casts = [
    'images' => 'array', // Automatically decode JSON
];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    // protected static function boot()
    // {
    //     static::deleting(function ($department) {
    //         $department->translations()->delete();
    //     });
    // }
    public function translations()
{
    return $this->hasMany(ProjectTranslation::class);
}
public function scopeActive($query)
    {
        return $query->where('status', 'active');

    }

}

