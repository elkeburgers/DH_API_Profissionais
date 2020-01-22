<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Profissional; :necessario na opcao onde chamamos a classe

class Tecnologia extends Model
{
    protected $table = "tecnologias";
    // se tivesse alterado o nome do ID (padrao), teria que fazer o mesmo com ele aqui
    // public $timestamps = false; : precisaria se não tivesse colocado o timestamps na criacao da tabela

    //criando as relacoes entre as tabelas:
    public function profissionais(){
        //belongsToMany porque a relacao entre as tabelas eh N para N:
        // return $this->belongsToMany(Profissional::class); :opcao onde chamamos a classe (precisa do importar a classe, como comentario acima)
        //abaixo: a classe que estamos relacionando, a tabela intermediaria, o campo a relacionar da propria tabela, idem para a outra tabela.
        return $this->belongsToMany('App\Profissional', 'profissionais_tecnologias', 'tecnologia_id', 'profissional_id');
    }
}

