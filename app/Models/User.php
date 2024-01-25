<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;



class User extends Authenticatable 
{   
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'users';
    protected $fillable = [ 'firstname', 'lastname', 'email', 'phone_number', 'password','profile_image','verification_code', ];
    
     protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    public function address()
    {
        return $this->hasMany(Address::class);
    }
    
}
