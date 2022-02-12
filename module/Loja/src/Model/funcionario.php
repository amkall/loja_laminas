<?php

use namespace Funcionario\Model;

class Funcionario extends Pessoa{

    private id_funcionario;
    private login;
    private senha;

    public function exchangeArray(array $data){
        super($data);

        $this->id_funcionario = !empty($data['id_funcionario']) ? $data['id_funcionario'] : null;
        $this->login          = !empty($data['login'])          ? $data['login']          : null;
        $this->senha          = !empty($data['senha'])          ? $data['senha']          : null;
    }
}