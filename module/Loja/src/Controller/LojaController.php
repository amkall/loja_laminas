<?php
namespace Loja\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

use Loja\Model\PessoaTable;
use Loja\Model\FuncionarioTable;
use Loja\Model\ClienteTable;
use Loja\Model\ProdutoTable;
use Loja\Model\VendaTable;

use Loja\Form\ProdutoForm;
use Loja\Model\Produto;

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
        $form = new ProdutoForm();
        $form->get('submit')->setValue('add');

        $request = $this->getRequest();

        if(! $request->isPost()){
            return ['form' => $form];
        }

        $produto = new Produto();

        $form->setInputFilter($produto->getInputFilter());

        $post = array_merge_recursive(
            $request->getPost()->toArray(),
            $request->getFiles()->toArray()
        );

        $form->setData($post);
        
        if(! $form->isValid()){
            return ['form' => $form];
        }
        /*
        Não funciona pois a classe do tutorial não ultiliza encapsulamento,
        mas aqui ele é ultilizado.
        //$produto->exchangeArray($form->getData());
        kkkkkkkkkkk
        */
        $aux = $form->getData();
        print_r($aux);
        
        $produto->setNome($aux['nome']);
        $produto->setImagem($aux['imagem']);

        $produto->setValidade($aux['validade']);
        $produto->setQtd_estoque($aux['qtd_estoque']);

        $produto->setCusto($aux['custo']);
        $produto->setPreco($aux['preco']);
        $produto->setCategoria($aux['categoria']);

        $this->produto->saveProduto($produto);

        return $this->redirect()->toRoute('loja');
    }
}