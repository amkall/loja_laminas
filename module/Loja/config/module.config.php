<?php

namespace Loja;
use Laminas\Router\Http\Segment;


return [
     // The following section is new and should be added to your file:
     'router' => [
        'routes' => [
            'loja' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/loja[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\LojaController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'loja' => __DIR__ . '/../view',
        ],
    ],
];