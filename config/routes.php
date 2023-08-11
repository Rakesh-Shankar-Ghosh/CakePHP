<?php


use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

require __DIR__ . '../../src/Route/StudentRoute.php';


return static function (RouteBuilder $routes) {

    $routes->setRouteClass(DashedRoute::class);
    StudentRouteHandler( $routes);

    // $routes->scope('/', function (RouteBuilder $builder) {
      
    //     $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    //     $builder->connect('/pages/*', 'Pages::display');

    //     $builder->fallbacks();
        
        
    // });

};