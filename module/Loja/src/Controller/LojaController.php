<?php
namespace Loja\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class LojaController extends AbstractActionController
{
    private $pessoa;
    private $funcionario;
    private $cliente;
    private $produto;
    private $venda;

    public function indexAction(PessoaTable $pessoa, FuncionarioTable $funcionario, ClienteTable $cliente, ProdutoTable $produto, VendaTable $venda){

        $this->pessoa      = $pessoa;
        $this->funcionario = $funcionario;
        $this->cliente     = $cliente;
        $this->produto     = $produto;
        $this->venda       = $venda;

    }
}