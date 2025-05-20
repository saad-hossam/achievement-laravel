<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'logo',
    ];
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('status', 'active');

    }
}
