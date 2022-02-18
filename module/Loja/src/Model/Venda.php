<?php

use namespace Loja\Model;

class Venda{
    ]
    private $id_venda;
    private $id_clinte;
    private $id_produto;
    private $data;

    public function exchangeArray(array $data){

        $this->id_venda    = !empty($data['id_venda'])    ? $data['id_venda']    : null;
        $this->id_cliente  = !empty($data['id_cliente'])  ? $data['id_cliente']  : null;
        $this->id_produto  = !empty($data['id_produto'])  ? $data['id_produto']  : null;
        $this->data        = !empty($data['data'])        ? $data['data']        : null;
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