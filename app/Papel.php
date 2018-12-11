<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $table = 'papeis';
    protected $fillable = ['nome', 'descricao'];
    
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function permissao()
    {
        return $this->belongsToMany(Permissao::class);
    }
    
    public function adicionaPermissao($permissao)
    {
        if(is_string($permissao)){
            $permissao = Permissao::where('nome', '=', $permissao)->findOrFail();
        }
        
        if($this->existePermissao($permissao)){
            return;
        }
        
        return $this->permissao()->attach($permissao);
    }
    
    public function existePermissao($permissao)
    {
        if(is_string($permissao)){
            $permissao = Permissao::where('nome', '=', $permissao)->findOrFail();
        }
        
        return (boolean) $this->permissao()->find($permissao);
    }
    
    public function removePermissao($permissao)
    {
        if(is_string($permissao)){
            $permissao = Permissao::where('nome', '=', $permissao)->findOrFail();
        }
        
        return $this->permissao()->detach($permissao);
    }
}
