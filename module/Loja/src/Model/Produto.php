<?php
namespace Loja\Model;

// Add the following import statements:
use DomainException;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Filter\ToInt;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Validator\StringLength;

class Produto implements InputFilterAwareInterface
{

    private $id_produto;
    private $nome;
    private $imagem;
    private $validade;
    private $qtd_estoque;
    private $custo;
    private $preco;
    private $categoria;

    //inputfilter
    private $inputFilter;

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

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }
    
    public function getInputFilter()
    {
        if ($this->inputFilter){
            return $this->inputFilter;
        }
        $inputFilter = new inputFilter();
        
        //filter       -> https://docs.laminas.dev/laminas-filter/
        //validators   -> https://docs.laminas.dev/laminas-validator/
        //para verificação dos filtros e validações que podem ser aplicadas


        inputFilter->add([
            'name'           =>  'id_produto',
            'requeriment'    =>   true, 
            'filters'        =>   [
                ['name' =>  ToInt::class],
            ],
        ]);
        inputFilter->add([
            'name'           =>  'nome',
            'required'       =>   true, 
            'filters'        =>   [
                ['name' =>  StripTags::class],
                ['name' =>  StringTrim::class],
            ],
            'validators' => [
                [
                    'name'     => StringLength::class,
                    'options'  => [
                        'encoding' => 'UTF-8',
                        'min'      => 1, 
                        'max'      => 100,
                    ],
                ],
            ],
        ]);
        $inputFilter->add([
            'name' => 'imagem',
            'required' => true,
        ]);
        $inputFilter->add([
            'name' => 'validade',
            'required' => true,
            'filters' => [],
            'validators' => [
                [
                    'name' => Date::class,
                    'options' => [
                        'format'  => 'd-m-y'
                    ],
                ],
            ],
        ]);
        inputFilter->add([
            'name'           =>  'qtd_estoque',
            'requeriment'    =>   true, 
            'filters'        =>   [
                ['name' =>  ToInt::class],
            ],
        ]);
        inputFilter->add([
            'name'           =>  'custo',
            'requeriment'    =>   true, 
            'filters'        =>   [
                ['name' =>  Tofloat::class],
            ],
            'validators' => [
                [
                    'name' => IsFloat::class,
                    'locale' => 'pt-BR',
                    ],
                ],
            ]
        ]);
        inputFilter->add([
            'name'           =>  'preco',
            'requeriment'    =>   true, 
            'filters'        =>   [
                ['name' =>  Tofloat::class],
            ],
            'validators' => [
                [
                    'name'   => IsFloat::class,
                    'locale' => 'pt-BR',
                    ],
                ],
            ]
        ]);
        inputFilter->add([
            'name'           =>  'categoria',
            'required'       =>   true, 
            'filters'        =>   [
                ['name' =>  StripTags::class],
                ['name' =>  StringTrim::class],
            ],
            'validators' => [
                [
                    'name'     => StringLength::class,
                    'options'  => [
                        'encoding' => 'UTF-8',
                        'min'      => 1, 
                        'max'      => 100,
                    ],
                ],
            ],
        ]);



       
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