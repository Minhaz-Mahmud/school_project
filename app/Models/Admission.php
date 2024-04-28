<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $table = 'admission';
    protected $fillable = [
        
         'name',
         'class',
         'gender',
         'age',
         'previous_school'
];
}
