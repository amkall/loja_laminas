<?php
namespace Loja\Model;

class Produto {

    private $id_produto;
    private $nome;
    private $imagem;
    private $validade;
    private $qtd_estoque;
    private $custo;
    private $preco;
    private $categoria;

    public function exchangeArray(array $data){

        $this->id_cliente  = !empty($data['ID_PRODUTO'])  ? $data['ID_PRODUTO']  : null;
        $this->nome        = !empty($data['NOME'])        ? $data['NOME']        : null;
       
        $this->imagem      = !empty($data['IMAGEM'])      ? $data['IMAGEM']      : null;
        $this->validade    = !empty($data['VALIDADE'])    ? $data['VALIDADE']    : null;
       
        $this->qtd_estoque = !empty($data['QTD_ESTOQUE']) ? $data['QTD_ESTOQUE'] : null;
        $this->custo       = !empty($data['CUSTO'])       ? $data['CUSTO']       : null;

        $this->preco       = !empty($data['PRECO'])       ? $data['PRECO']       : null;
        $this->categoria   = !empty($data['CATEGORIA'])   ? $data['CATEGORIA']   : null;
        
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
    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
}