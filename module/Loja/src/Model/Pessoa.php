<?php

namespace Pessoa\Model;

class Pessoa{

    private $id_pessoa;
    private $cpf;
    private $nome;
    private $telefone;
    private $email;
    private $cidade;
    private $bairro;
    private $rua;

    public function exchangeArray(array $data){
        $this->id_pessoa = !empty($data['id_pessoa']) ? $data['id_pessoa'] : null;
        $this->cpf       = !empty($data['cpf'])       ? $data['cpf']       : null;

        $this->nome      = !empty($data['nome'])      ? $data['nome']      : null;
        $this->telefone  = !empty($data['telefone'])  ? $data['telefone']  : null;

        $this->email     = !empty($data['email'])     ? $data['email']     : null;
        $this->cidade    = !empty($data['cidade'])    ? $data['cidade']    : null;

        $this->bairro    = !empty($data['bairro'])    ? $data['bairro']    : null;
        $this->rua       = !empty($data['rua'])       ? $data['rua']       : null;
    }
    
    public function getId_pessoa(){
        return $this->id_pessoa;
    }
    public function setId_pessoa($id_pessoa){
        $this->id_pessoa = $id_pessoa;
    }

    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getBairro(){
        return $this->bairro;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getRua(){
        return $this->rua;
    }
    public function setRua($rua){
        $this->rua = $rua;
    }
}