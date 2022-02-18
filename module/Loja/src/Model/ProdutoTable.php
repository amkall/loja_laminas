<?php

use namespace Loja\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class ProdutoTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function gethAll()
    {
        return $this->tableGateway->select();
    }

    public function getProduto($id_produto)
    {
        $id_produto = (int) $id_produto;
        $rowset = $this->tableGateway->select(['ID_PRODUTO' => $id_produto]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id_produto
            ));
        }

        return $row;
    }

    public function saveProduto(Produto $produto)
    {
        $data = [
            'ID_PRODUTO'  => $produto->id_produto;
            'NOME'        => $produto->nome;
            'IMAGEM'      => $produto->imagem;
            'VALIDADE'    => $produto->validade;
            'QTD_ESTOQUE' => $produto->qtd_estoque;
            'CUSTO'       => $produto->custo;
            'PRECO'       => $produto->preco;    
        ];

        $id_produto = (int) $produto->id_produto;

        if ($id_produto === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getProduto($id_produto);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update Produto with identifier %d; does not exist',
                $id_produto
            ));
        }

        $this->tableGateway->update($data, ['ID_PRODUTO' => $id_produto]);
    }

    public function deleteProduto($id_produto)
    {
        $this->tableGateway->delete(['ID_PRODUTO' => (int) $id_produto]);
    }
}