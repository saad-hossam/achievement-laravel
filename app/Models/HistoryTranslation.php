<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryTranslation extends Model
{
 // The table associated with the model
 protected $table = 'history_translations';  // Optional, Laravel will infer this from the model name

 // Disable timestamps if you're not using them for translations
 public $timestamps = false;

 // Define the fillable fields for mass-assignment
 protected $fillable = [
     'history_id', 'locale', 'name','description','image'
 ];
}
