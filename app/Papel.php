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
}
