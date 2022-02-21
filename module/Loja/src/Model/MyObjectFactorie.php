<?php

namespace MyObjectFactorie\Model;
use Laminas\Db\TableGateway\TableGateway;

use Laminas\ServiceManager\Factory\FactorieInterface;


class MyObjectFactorie implements FactorieInterface{
    
    public function __invoke(ContainerInterface $container, $requestdname, array $options = null ){
        
    } 
}