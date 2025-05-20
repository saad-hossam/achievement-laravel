<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    protected $table = 'category_translations';  // Optional, Laravel will infer this from the model name
    public $timestamps = false;
    protected $fillable = [
        'category_id', 'locale', 'name'
    ];
}
