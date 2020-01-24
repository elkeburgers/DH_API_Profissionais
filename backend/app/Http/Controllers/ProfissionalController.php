<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profissional;
use App\Tecnologia;

class ProfissionalController extends Controller
{
    //criando metodo para listar todos os dados do profissional
    public function listarProfissionais(Request $request){
        $listaProfissionais = Profissional::all();

        // nao retorna view por ser uma API, apenas um json, que precisa ser uma resposta (response)(palavra reservada do laravel):
        return response()->json($listaProfissionais);
    }

    // para criar os profissionais:
    public function criarProfissional(Request $request){
        // acrescentando tecnologia para associar ao profissional:
        $tecnologiaId = $request->tecnologia;
        $newProfissional = new Profissional();
        // dizendo a coluna da tabela onde estah o dado que estamos criando, nomes iguais aos das migrations:
        $newProfissional->name = $request->name;
        $newProfissional->github = $request->github;
        // usa o result para salvar tudo dentro de um lugar:
        $result = $newProfissional->save();

        // acrescentando tecnologia para associar ao profissional:
        // dd($tecnologiaId); -> apenas para imprimir na tela do Postman
        $tecnologia = Tecnologia::find($tecnologiaId);
        if($tecnologia){
            $tecnologia->profissionais()->attach($newProfissional->id);
        }else{
            return response()->json(["error"=>"O id da tecnologia não existe."]);
        }

        // para saber se deu certo, retornando na tela apenas os dados do profissional criado. Se usasse result, retornaria True ou False:
        return response()->json($newProfissional);
    }
}
