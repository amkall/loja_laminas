<?php

namespace Loja\Model;

class Venda{
    private $id_venda;
    private $id_clinte;
    private $id_produto;
    private $data;

    public function exchangeArray(array $data){

        $this->id_venda    = !empty($data['ID_VENDA'])    ? $data['ID_VENDA']    : null;
        $this->id_cliente  = !empty($data['ID_CLIENTE'])  ? $data['ID_CLIENTE']  : null;
        $this->id_produto  = !empty($data['ID_PRODUTO'])  ? $data['ID_PRODUTO']  : null;
        $this->data        = !empty($data['DATA'])        ? $data['DATA']        : null;
    }


    /**
     * Get the value of id_venda
     */ 
    public function getId_venda()
    {
        return $this->id_venda;
    }

    /**
     * Set the value of id_venda
     *
     * @return  self
     */ 
    public function setId_venda($id_venda)
    {
        $this->id_venda = $id_venda;

        return $this;
    }

    /**
     * Get the value of id_clinte
     */ 
    public function getId_clinte()
    {
        return $this->id_clinte;
    }

    /**
     * Set the value of id_clinte
     *
     * @return  self
     */ 
    public function setId_clinte($id_clinte)
    {
        $this->id_clinte = $id_clinte;

        return $this;
    }

    /**
     * Get the value of id_produto
     */ 
    public function getId_produto()
    {
        return $this->id_produto;
    }

    /**
     * Set the value of id_produto
     *
     * @return  self
     */ 
    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}