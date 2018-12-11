<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Papel;
use Illuminate\Support\Facades\Gate;

class UsuarioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Gate::denies('usuario-view')) {
            abort(403, "Não autorizado!");
        }

        $usuarios = User::all();
        $caminhos = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => '', 'titulo' => 'Usuarios'],
        ];
        return view('admin.usuarios.index', compact('usuarios', 'caminhos'));
    }

    public function papel($id) {
        if (Gate::denies('papel-view')) {
            abort(403, "Não autorizado!");
        }

        $usuario = User::find($id);
        $papel = Papel::all();
        $caminhos = [
            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url' => route('usuarios.index'), 'titulo' => 'Usuarios'],
            ['url' => '', 'titulo' => 'Papel'],
        ];

        return view('admin.usuarios.papel', compact('usuario', 'papel', 'caminhos'));
    }

    public function papelStore(Request $request, $id) {
        if (Gate::denies('usuario-create')) {
            abort(403, "Não autorizado!");
        }

        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        //Metodo no controller de model de usuario
        $usuario->adicionaPapel($papel);

        return redirect()->back();
    }

    public function papelDestroy($id, $papel_id) {
        if (Gate::denies('usuario-destroy')) {
            abort(403, "Não autorizado!");
        }

        $usuario = User::find($id);
        $papel = Papel::find($papel_id);
        //Metodo no controller de model de usuario
        $usuario->removePapel($papel);

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
