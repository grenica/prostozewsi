<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Notifications\Notifiable;
use App\Role;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
// class User extends Model //implements Authenticatable
{
    use Notifiable, HasApiTokens;
    //use Authenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // impolemetowane metody
    // public function getAuthIdentifierName() {
    //     return 'id';
    // }
    //  public function getAuthIdentifier() {
    //     return $this->id;
    //  }
    //  public function getAuthPassword() {
    //      return $this->password;
    //  }
    //  public function getRememberToken() {
    //      return 'remember_token';
    //  }
    //  public function setRememberToken($value) {
    //      $this->remember_token = $value;
    //  }
    //  public function getRememberTokenName() {
    //     return $this->remember_column;
    //  }

    // relacje
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin() {
        if($this->roles->first()->name =='Admin'){
            return true;
        } else {
            return false;
        }
        
    }
    
    public function isFarmer() {
        if($this->roles->first()->name =='Rolnik'){
            return true;
        } else {
            return false;
        }
       
    }
    public function isClient() {
        if($this->roles->first()->name =='Klient'){
            return true;
        } else {
            return false;
        }
       
    }

    public function farmer() {
        //  return $this->hasMany(Farmers::class);
         return $this->hasOne(Farmer::class);
    }

    public function client() {
        //  return $this->hasMany(Farmers::class);
         return $this->hasOne(Client::class);
    }

    // public function roles() {
    //     return $this->belongsToMany(Role::class);
    // }
}
