<?php
namespace Loja\Model;

use RuntimeExeption;
use Laminas\Db\TableGateway\TableGatewayInterface;

class ClienteTable{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway){
        
        $this->tableGateway = $tableGateway;

    }

    public function getAll(){
        return $this->tableGateway->select();
    }

    public function getCliente($id_cliente){

        $id_cliente     = (int) $id_cliente;
        $rowset = this->tableGateway->select(['ID_CLIENTE' => $id_cliente]);
        $row    = $rowset->current();

        if(! $row){
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id_cliente
            ));
        }

        return $row;

    }

    public function saveCliente(Cliente $cliente){
        
        $data = [
            'ID_CLIENTE' => $cliente->getId_cliente();
            'LOGIN'      => $cliente->getLogin();
            'SENHA'      => $cliente->getSenha();
        ];

        $id_cliente = (int) $cliente->getId_cliente();
        
        // id_cliente nao e passado, se for uma atualização nao entra
        
        if($id_cliente === 0){
            $this->tableGateway->insert($data);
            
            return;
        }

        try {
            $this->getCliente($id_cliente);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id_cliente
            ));
        }

        $this->tableGateway->update($data, ['ID_CLIENTE' => $id_cliente]);
    }
    public function deleteCliente($id_cliente){
        $this->tableGateway->delete(['ID_CLIENTE' => (int) $id_cliente]);
    }
}