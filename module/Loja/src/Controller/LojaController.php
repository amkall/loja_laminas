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
    private $pessoa;
    private $funcionario;
    private $cliente;
    private $produto;
    private $venda;

    public function __construct(PessoaTable $pessoa)
    {

        $this->pessoa = $pessoa;


    }

    public function indexAction()
    {
        return new ViewModel([
            'pessoas' => $this->pessoa->getAll()
        ]);
    }

    public function addAction(){
        
    }
}