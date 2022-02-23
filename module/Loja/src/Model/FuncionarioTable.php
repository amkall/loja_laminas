<?php

namespace Loja\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

Class FuncionarioTable{
    private $tabeGateway;

    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateaway;
    }

    public function getAll($id_funcionario){

        return $this->tableGateway->select();

    }
    public function getFuncionario(){

        $id_funcionario = (int) $id_funcionario;
        $rowset         = $this->tableGateway->select(['ID_FUNCIONARIO' => $id_funcionario]);
        $row            = $rowset->current();


        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveFuncionario(Funcionario $funcionario){
        
        $data = [
            'ID_FUNCIONARIO'  => $funcionario->getId_funcionario(),
            'LOGIN'           => $funcionario->getLogin(),
            'SENHA'           => $funcionario->getSenha(),
            'SITUACAO'        => $funcionario->getSituacao(),
            'ACESSO'          => $funcionario->getAcesso(),
        ];

        $id_funcionario = (int) $funcionario->getId_funcionario();

        if($id_funcionario === 0){

            $this->tableGateway->insert($data);

        }

        try {
            $this->getFuncionario($id_funcionario);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update funcionario with identifier %d; does not exist',
                $id_funcionario
            ));
        }

        $this->tableGateway->update($data, ['ID_FUNCIONARIO' => $id_funcionario]);

    }
    public function deleteFuncionario($id_funcionario){
        $this->tableGateway->delete(['ID_FUNCIONARIO' => (int) $id_funcionario]);
    }
}
