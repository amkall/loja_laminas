<?php 

namespace Loja;
// Add these import statements:
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use MyObject\Factorie;

class Module implements ConfigProviderInterface{
    public function getConfig(){
        return include __DIR__ . '/../config/module.config.php';
    }
    // Add this method:
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\PessoaTable::class => function($container) {
                    $tableGateway = $container->get(Model\PessoaTableGateway::class);
                    return new Model\PessoaTable($tableGateway);
                },
                Model\PessoaTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Pessoa());
                    return new TableGateway('pessoa', $dbAdapter, null, $resultSetPrototype);
                },
                Model\FuncionarioTable::class => function($container) {
                    $tableGateway = $container->get(Model\FuncionarioTableGateway::class);
                    return new Model\FuncionarioTable($tableGateway);
                },
                Model\FuncionarioTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Funcionario());
                    return new TableGateway('funcionario', $dbAdapter, null, $resultSetPrototype);
                },
                Model\ClienteTable::class => function($container) {
                    $tableGateway = $container->get(Model\ClienteTableGateway::class);
                    return new Model\ClienteTable($tableGateway);
                },
                Model\ClienteTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Cliente());
                    return new TableGateway('cliente', $dbAdapter, null, $resultSetPrototype);
                },
                Model\ProdutoTable::class => function($container) {
                    $tableGateway = $container->get(Model\ProdutoTableGateway::class);
                    return new Model\ProdutoTable($tableGateway);
                },
                Model\ProdutoTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Produto());
                    return new TableGateway('produto', $dbAdapter, null, $resultSetPrototype);
                },
                Model\VendaTable::class => function($container) {
                    $tableGateway = $container->get(Model\VendaTableGateway::class);
                    return new Model\VendaTable($tableGateway);
                },
                Model\VendaTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Venda());
                    return new TableGateway('venda', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    // Add this method:
   public function getControllerConfig()
   {
       return [
           'factories' => [
               Controller\LojaController::class => function($container) {
                   return new Controller\LojaController(
                       $container->get(Model\PessoaTable::class), $container->get(Model\FuncionarioTable::class), $container->get(Model\ClienteTable::class),
                       $container->get(Model\ProdutoTable::class), $container->get(Model\VendaTable::class)
                   );
               },
           ],
       ];
   }
}