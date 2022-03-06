<?php

namespace Loja\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class VendaTable
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

    public function getVenda($id_venda)
    {
        $id_venda = (int) $id_venda;
        $rowset = $this->tableGateway->select(['ID_VENDA' => $id_venda]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id_venda
            ));
        }

        return $row;
    }

    public function saveVenda(Venda $venda)
    {
        $data = [
            'ID_VENDA'   => $venda->getId_venda(),
            'ID_CLIENTE' => $venda->getId_cliente(),
            'ID_PRODUTO' => $venda->getId_produto(),
            'DATA'       => $venda->getData(),

        ];

        $id_venda = (int) $venda->getId_venda();

        if ($id_venda === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getVenda($id_venda);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update Venda with identifier %d; does not exist',
                $id_venda
            ));
        }

        $this->tableGateway->update($data, ['ID_VENDA' => $id_venda]);
    }

    public function deleteVenda($id_venda)
    {
        $this->tableGateway->delete(['ID_VENDA' => (int) $id_venda]);
    }
}