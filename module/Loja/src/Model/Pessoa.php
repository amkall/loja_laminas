<?php

namespace Loja\Model;

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
        // mesmo nome que consta no banco de dados, levando em consideração se é maiusculo ou minusculo
        $this->id_pessoa = !empty($data['ID_PESSOA']) ? $data['ID_PESSOA'] : null;
        $this->cpf       = !empty($data['CPF'])       ? $data['CPF']       : null;

        $this->nome      = !empty($data['NOME'])      ? $data['NOME']      : null;
        $this->telefone  = !empty($data['TELEFONE'])  ? $data['TELEFONE']  : null;

        $this->email     = !empty($data['EMAIL'])     ? $data['EMAIL']     : null;
        $this->cidade    = !empty($data['CIDADE'])    ? $data['CIDADE']    : null;

        $this->bairro    = !empty($data['BAIRRO'])    ? $data['BAIRRO']    : null;
        $this->rua       = !empty($data['RUA'])       ? $data['RUA']       : null;
    }
    
    

    /**
     * Get the value of id_pessoa
     */ 
    public function getId_pessoa()
    {
        return $this->id_pessoa;
    }

    /**
     * Set the value of id_pessoa
     *
     * @return  self
     */ 
    public function setId_pessoa($id_pessoa)
    {
        $this->id_pessoa = $id_pessoa;

        return $this;
    }

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of telefone
     */ 
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */ 
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of bairro
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */ 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of rua
     */ 
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Set the value of rua
     *
     * @return  self
     */ 
    public function setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }
}