<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectTranslation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'locale',
        'project_id',
        'status',
        'image',
        'images',
        'department_id',
        // 'created_at',
        // 'updated_at',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }


}
