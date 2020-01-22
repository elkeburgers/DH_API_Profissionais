<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profissionais;

class ProfissionalController extends Controller
{
    //criando metodo para listar todos os dados do profissional
    public function listarProfissionais(Request $request){
        $listaProfissionais = Profissional::all();

        // nao retorna view por ser uma API, apenas um json, que precisa ser uma resposta (response)(palavra reservada do laravel):
        return response()->json($listaProfissionais);
    }
}
