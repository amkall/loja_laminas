<?php
namespace Loja\Model;

class Cliente extends Pessoa{

    private $id_cliente;
    private $login;
    private $senha;

    public function exchangeArray(array $data){
        super($data);

        $this->id_cliente = !empty($data['ID_CLIENTE']) ? $data['ID_CLIENTE'] : null;
        $this->login      = !empty($data['LOGIN'])      ? $data['LOGIN']      : null;
        $this->senha      = !empty($data['SENHA'])      ? $data['SENHA']      : null;
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