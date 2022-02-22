<?php 

namespace Loja;
// Add these import statements:
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface{
    public function getConfig(){
        return include __DIR__ . '/../config/module.config.php';
    }
    // Add this method:
    public function getServiceConfig()
    {
        return [
            'factories' => [
                PessoaTable::class => function($container) {
                    $tableGateway = $container->get(PessoaTableGateway::class);
                    return new PessoaTable($tableGateway);
                },
                PessoaTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Pessoa());
                    return new TableGateway('pessoa', $dbAdapter, null, $resultSetPrototype);
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
                       $container->get(PessoaTable::class), $container->get(FuncionarioTable::class), $container->get(ClienteTable::class,
                       $container->get(ProdutoTable::class), $container->get(VendaTable::class))
                   );
               },
           ],
       ];
   }
}