<?php
namespace Loja\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use Loja\Model\PessoaTable;
use Loja\Model\FuncionarioTable;
use Loja\Model\ClienteTable;
use Loja\Model\ProdutoTable;
use Loja\Model\VendaTable;

class LojaController extends AbstractActionController
{
    private $cliente;
    private $funcionario;
    private $pessoa;
    private $produto;
    private $venda;

    public function __construct(ClienteTable $cliente, FuncionarioTable $funcionario, PessoaTable $pessoa,
                                 ProdutoTable $produto, VendaTable $venda)
    {
        $this->cliente     = $cliente;
        $this->funcionario = $funcionario;
        $this->pessoa      = $pessoa;
        $this->produto     = $produto;
        $this->venda       = $venda;
    }

    public function indexAction()
    {
        return new ViewModel([
            'clientes'     => $this->cliente->getAll(),
            'funcionarios' => $this->funcionario->getAll(),
            'pessoas'      => $this->pessoa->getAll(),
            'produtos'     => $this->produto->getAll(), 
            'venda'        => $this->venda->getAll(),
        ]);
    }

    public function addAction(){
        
    }
}