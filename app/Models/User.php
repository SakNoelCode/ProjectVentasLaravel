<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**Usuarios en la base de datos
 * name: Admin
 * password: admin2121
 * 
 * name: useradmin
 * password: useradmin12
 * 
 * name: Arcangel RS
 * password: soyadmin12
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /**Campos que van a guardarse en la tabla */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    /**Campos que serán ocultos para guardarse en la base de datos */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /**Campos que serán casteados */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**Encriptar Password */
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
    
}
