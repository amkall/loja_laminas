<?php

namespace Loja\Form;
use Laminas\Form\Form;
use Loja\Model;

Class ProdutoForm extends Form
{
    public function __construct($name = null)
    {
        parent:: __construct('produto');
    

        $this->add([
            'name' => 'id_produto', 
            'type' => 'hidden',
        ]);
        $this->add([
            'name'    => 'nome', 
            'type'    => 'text', 
            'options' => [
                'label' => 'Nome',
            ]
        ]);
        $this->add([
            'name'    => 'imagem', 
            'type'    => 'file', 
            'options' => [
                'label' => 'Imagem',
            ],
        ]);
        
        $this->add([
            'name'    => 'validade', 
            'type'    => 'date', 
            'options' => [
                'label' => 'Validade',
            ]
        ]);
        $this->add([
            'name'    => 'qtd_estoque', 
            'type'    => 'number', 
            'options' => [
                'label' => 'Qtd_estoque',
            ]
        ]);
        $this->add([
            'name'    => 'custo', 
            'type'    => 'number', 
            'options'    => [
                'label' => 'Custo',
            ],
            'attributes' => [
                'min'  => '0', 
                'step' => '0.1'
            ],
        ]);
        $this->add([
            'name'    => 'preco', 
            'type'    => 'number', 
            'options' => [
                'label' => 'Preco',
            ],
            'attributes' => [
                'min'  => '0', 
                'step' => '0.1'
            ],
            
        ]);
        $this->add([
            'name'    => 'categoria', 
            'type'    => 'text', 
            'options' => [
                'label' => 'Categoria',
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