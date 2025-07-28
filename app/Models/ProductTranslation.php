<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductTranslation extends Model
{
    use HasFactory;
    protected $table = 'product_translations';  // Optional, Laravel will infer this from the model name

    // Disable timestamps if you're not using them for translations
    public $timestamps = false;

    // Define the fillable fields for mass-assignment
    protected $fillable = [
        'product_id', 'locale', 'name','body','description'
    ];

    // A translation belongs to one product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
