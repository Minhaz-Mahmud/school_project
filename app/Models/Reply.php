<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $table = 'reply';
    protected $fillable = [
        'request_id',
        'topic',
        'message',
    ];

    
}
