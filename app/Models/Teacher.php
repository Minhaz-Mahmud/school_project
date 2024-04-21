<?php



namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $table = 'teacher';
        protected $fillable = [
            'image',
             'name',
             'qualification',
             'gender',
             'age',
             'designation'
 ];
}
