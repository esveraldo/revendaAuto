<?php

namespace App\Providers;

use App\Chamado;
use App\Permissao;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        //'App\Chamado' => 'App\Policies\ChamadoPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*Gate::define('ver-chamado', function($user, Chamado $chamado){
            return $user->id == $chamado->user_id;
        });*/
        
     foreach ($this->listarPermissoes() as $permissao){
         Gate::define($permissao->nome, function($user) use($permissao){
             return $user->temUmPapelDeste($permissao->papel) || $user->eAdmin();
         });
     }
    }
    
    public function listarPermissoes()
    {
        return Permissao::with('papel');
    }
}
