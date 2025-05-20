<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentTranslation extends Model
{
    // The table associated with the model
    protected $table = 'department_translations';  // Optional, Laravel will infer this from the model name

    // Disable timestamps if you're not using them for translations
    public $timestamps = false;

    // Define the fillable fields for mass-assignment
    protected $fillable = [
        'department_id', 'locale', 'name','image'
    ];

    // A translation belongs to one department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
