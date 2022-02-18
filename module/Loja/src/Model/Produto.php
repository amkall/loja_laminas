<?php

use namespace Loja\Model;

class Produto {

    private $id_produto;
    private $nome;
    private $imagem;
    private $validade;
    private $qtd_estoque;
    private $custo;
    private $preco;

    public function exchangeArray(array $data){

        $this->id_cliente  = !empty($data['id_cliente'])  ? $data['id_cliente']  : null;
        $this->nome        = !empty($data['nome'])        ? $data['nome']        : null;
       
        $this->imagem      = !empty($data['imagem'])      ? $data['imagem']      : null;
        $this->validade    = !empty($data['validade'])    ? $data['validade']    : null;
       
        $this->qtd_estoque = !empty($data['qtd_estoque']) ? $data['qtd_estoque'] : null;
        $this->custo       = !empty($data['custo'])       ? $data['custo']       : null;
        $this->preco       = !empty($data['preco'])       ? $data['preco']       : null;
    }

    public function getId_produto(){
        return $this->id_produto;
    }
    public function setId_produto($id_produto){
        $this->id_produto = $id_produto;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getImagem(){
        return $this->imagem;
    }
    public function setImagem($imagem){
        $this->imagem = $imagem;
    }

    public function getValidade(){
        return $this->validade;
    }
    public function setValidade($validade){
        $this->validade = $validade;
    }

    public function getQtd_estoque(){
        return $this->qtd_estoque;
    }
    public function setQtd_estoque($qtd_estoque){
        $this->qtd_estoque = $qtd_estoque;
    }

    public function getCusto(){
        return $this->custo;
    }
    public function setCusto($custo){
        $this->custo = $custo;
    }

    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($preco){
        $this->preco = $preco;
}