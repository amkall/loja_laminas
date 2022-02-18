<?php
namespace Loja\Model;

class Cliente extends Pessoa{

    private $id_cliente;
    private $login;
    private $senha;

    public function exchangeArray(array $data){
        super($data);

        $this->id_cliente = !empty($data['id_cliente']) ? $data['id_cliente'] : null;
        $this->login      = !empty($data['login'])      ? $data['login']      : null;
        $this->senha      = !empty($data['senha'])      ? $data['senha']      : null;
    }

    public function getId_cliente(){
        return $this->id_cliente;
    }
    public function setId_cliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }


    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }


    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
}