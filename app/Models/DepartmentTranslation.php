<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentTranslation extends Model
{
    protected $table = 'department_translations';

    public $timestamps = false;

    protected $fillable = [
        'department_id',
        'locale',
        'name',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
