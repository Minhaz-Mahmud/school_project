<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    // protected $primaryKey = 'teacher_id';
    public $incrementing = false;
    protected $fillable = ['request_id','teacher_id','name', 'email','mobile','topic'];
}
