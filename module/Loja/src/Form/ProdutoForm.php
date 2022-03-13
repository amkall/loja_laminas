<?php

namespace Loja\Form;
use Laminas\Form\Form;

Class ProdutoForm extends Form
{
    public function __construct($name = null)
    {
        parent:: __construct('Produto');
    

        $this->add([
            'name' => 'id_produto', 
            'type' => 'hidden',
        ]);
        $this->add([
            'name'    => 'nome', 
            'type'    => 'text', 
            'options' => [
                'label' => 'nome',
            ]
        ]);
        $this->add([
            'name'    => 'imagem', 
            'type'    => 'image', 
            'options' => [
                'label' => 'imagem',
            ]
        ]);
        $this->add([
            'name'    => 'validade', 
            'type'    => 'date', 
            'options' => [
                'label' => 'validade',
            ]
        ]);
        $this->add([
            'name'    => 'qtd_estoque', 
            'type'    => 'number', 
            'options' => [
                'label' => 'qtd_estoque',
            ]
        ]);
        $this->add([
            'name'    => 'custo', 
            'type'    => 'number', 
            'options' => [
                'label' => 'custo',
            ]
        ]);
        $this->add([
            'name'    => 'preco', 
            'type'    => 'number', 
            'options' => [
                'label' => 'preco',
            ]
        ]);
        $this->add([
            'name'    => 'categoria', 
            'type'    => 'text', 
            'options' => [
                'label' => 'categoria',
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);

    }
}
    //id_produto;
    //nome;
    //imagem;
    //validade;
    //qtd_estoque;
    //custo;
    //preco;
    //categoria;