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
                     $container->get(Model\PessoaTable::class)
                   );
               },
           ],
       ];
   }
}