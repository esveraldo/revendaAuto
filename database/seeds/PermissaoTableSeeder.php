<?php

use Illuminate\Database\Seeder;

use App\Permissao;

class PermissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios1 = Permissao::firstOrCreate([
            'nome' => 'usuario-view',
            'descricao' => 'Acesso a lista de usuarios'
        ]);
        
        $usuarios2 = Permissao::firstOrCreate([
            'nome' => 'usuario-create',
            'descricao' => 'Criar usuarios'
        ]);
        
        $usuarios3 = Permissao::firstOrCreate([
            'nome' => 'usuario-edit',
            'descricao' => 'AEditar usuarios'
        ]);
        
        $usuarios4 = Permissao::firstOrCreate([
            'nome' => 'usuario-delete',
            'descricao' => 'Deletar usuarios'
        ]);
        
        $papeis1 = Permissao::firstOrCreate([
            'nome' => 'papel-view',
            'descricao' => 'Listar papeis'
        ]);
        
        $papeis2 = Permissao::firstOrCreate([
            'nome' => 'papel-create',
            'descricao' => 'Criar papeis'
        ]);
        
        $papeis3 = Permissao::firstOrCreate([
            'nome' => 'papel-edit',
            'descricao' => 'Editar papeis'
        ]);
        
        $papeis4 = Permissao::firstOrCreate([
            'nome' => 'papeis-delete',
            'descricao' => 'Deletar papeis'
        ]);
        
        $favoritos1 = Permissao::firstOrCreate([
            'nome' => 'favoritos-delete',
            'descricao' => 'Acesso aos favoritos'
        ]);
        
        $perfil1 = Permissao::firstOrCreate([
            'nome' => 'perfil-view',
            'descricao' => 'Acesso ao perfil'
        ]);
        
        $chamado1 = Permissao::firstOrCreate([
            'nome' => 'chamados-view',
            'descricao' => 'Acesso aos chamados'
        ]);
        
        $chamado2 = Permissao::firstOrCreate([
            'nome' => 'chamados-create',
            'descricao' => 'Acesso aos chamados'
        ]);
        
        $chamado3 = Permissao::firstOrCreate([
            'nome' => 'chamados-edit',
            'descricao' => 'Acesso aos chamados'
        ]);
        
        $chamado4 = Permissao::firstOrCreate([
            'nome' => 'chamados-delete',
            'descricao' => 'Acesso aos chamados'
        ]);
    }
}
