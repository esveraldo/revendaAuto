<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function carros()
    {
      return $this->belongsToMany('App\Carro');
    }

    public function eAdmin()
    {
        //return $this->id == 3;
        return $this->existePapel('Admin');
    }
    
    public function papel()
    {
        return $this->belongsToMany(Papel::class);
    }
    
    public function adicionaPapel($papel)
    {
        if(is_string($papel)){
            $papel = Papel::where('nome', '=', $papel)->firstOrFail();
        }
        
        if($this->existePapel($papel)){
            return;
        }
        
        return $this->papel()->attach($papel);
    }
    
    public function existePapel($papel)
    {
        if(is_string($papel)){
            $papel = Papel::where('nome', '=', $papel)->firstOrFail();
        }
        
        return (boolean) $this->papel()->find($papel->id);
    }
    
    public function removePapel($papel)
    {
        if(is_string($papel)){
            $papel = Papel::where('nome', '=', $papel)->findOrFail();
        }
        
        return $this->papel()->detach($papel);
    }
    
    public function temUmPapelDeste($papeis)
    {
        $userPapeis = $this->papel();
        return $papeis->intersect($userPapeis)->count();
    }

}
