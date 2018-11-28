<?php

namespace App\Http\Controllers;

use App\Chamado;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //$chamados = Chamado::where('user_id', '=', $user->id)->get();
        //Ver validação na view pelo blade usando can
        $chamados = Chamado::all();
        return view('home', compact('chamados'));
    }
    
    public function show($id)
    {
        $chamado = Chamado::find($id);
        //$this->authorize('ver-chamado', $chamado);
        if(Gate::allows('ver-chamado', $chamado)){
            return view('detalhes-do-chamado', compact('chamado'));
        }else{
            return view('autorizacao');
        }
    }
}
