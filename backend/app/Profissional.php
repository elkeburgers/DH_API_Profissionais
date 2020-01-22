<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $table = "profissionais";
    
    //criando as relacoes entre as tabelas:
    public function tecnologias(){
        // hasMany tem quase o mesmo trabalho do belongsToMany, muda a referencia (eles TEM a tecnologia, no outro models a tecnologia PERTENCE ao profissional):
        return $this->hasMany('App\Tecnologia', 'profissionais_tecnologias', 'profissional_id', 'tecnologia_id');
    }
}
