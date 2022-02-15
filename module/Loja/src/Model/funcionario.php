<?php

use namespace Funcionario\Model;

class Funcionario extends Pessoa{

    private $id_funcionario;
    private $login;
    private $senha;

    public function exchangeArray(array $data){
        super($data);

        $this->id_funcionario = !empty($data['id_funcionario']) ? $data['id_funcionario'] : null;
        $this->login          = !empty($data['login'])          ? $data['login']          : null;
        $this->senha          = !empty($data['senha'])          ? $data['senha']          : null;
    }

    /**
     * Get the value of id_funcionario
     */ 
    public function getId_funcionario()
    {
        return $this->id_funcionario;
    }

    /**
     * Set the value of id_funcionario
     *
     * @return  self
     */ 
    public function setId_funcionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}