<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;
    protected $table = 'marks';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'exam','bangla','english','math','science'];
}
