<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceTranslation extends Model
{
    use HasFactory;

     // The table associated with the model
     protected $table = 'service_translations';  // Optional, Laravel will infer this from the model name

     // Disable timestamps if you're not using them for translations
     public $timestamps = false;

     // Define the fillable fields for mass-assignment
     protected $fillable = [
         'service_id', 'locale', 'name','description','image','body'
     ];

     // A translation belongs to one department
    //  public function service()
    //  {
    //      return $this->belongsTo(Service::class);
    //  }

}
