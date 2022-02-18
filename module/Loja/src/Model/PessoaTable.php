<?php

use namespace Loja\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class PessoaTable
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

    public function getPessoa($id_pessoa)
    {
        $id_pessoa = (int) $id_pessoa;
        $rowset = $this->tableGateway->select(['ID_PESSOA' => $id_pessoa]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id_pessoa
            ));
        }

        return $row;
    }

    public function savePessoa(Pessoa $pessoa)
    {
        $data = [
            'ID_PESSOA' =>  $pessoa->id_pessoa;
            'CPF'       =>  $pessoa->cpf;
            'NOME'      =>  $pessoa->nome;
            'TELEFONE'  =>  $pessoa->telefone;
            'EMAIL'     =>  $pessoa->email;
            'CIDADE'    =>  $pessoa->cidade;
            'BAIRRO'    =>  $pessoa->bairro;
            'RUA'       =>  $pessoa->rua;
        ];

        $id_pessoa = (int) $pessoa->id_pessoa;

        if ($id_pessoa === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getPessoa($id_pessoa);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update pessoa with identifier %d; does not exist',
                $id_pessoa
            ));
        }

        $this->tableGateway->update($data, ['ID_PESSOA' => $id_pessoa]);
    }

    public function deletePessoa($id_pessoa)
    {
        $this->tableGateway->delete(['ID_PESSOA' => (int) $id_pessoa]);
    }
}