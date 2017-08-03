<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Traits\DatesTranslator;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;
    use DatesTranslator; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'email', 
        'password',
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
     * Mutadores
     */
     

    public function getFullNameAttribute()
    {
       return $this->nombres . ' ' . $this->apellidos;
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'assigned_roles')->withTimestamps();
    }

    public function hasRoles(array $roles)
    {        
        return $this->roles->pluck('name')->intersect($roles)->count();        
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function isSupervisor()
    {
        return $this->hasRoles(['supervisor']);
    }

    public function isMixAdmin()
    {
        return $this->hasRoles(['admin', 'supervisor']);
    }    

}
