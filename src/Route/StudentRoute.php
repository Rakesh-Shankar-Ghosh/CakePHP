<?php

use Cake\Routing\RouteBuilder;

// function StudentRouteHandler (RouteBuilder $routes) {
//     $routes->connect('/test', ['controller' => 'Student', 'action' => 'test']);
   
// };


function StudentRouteHandler (RouteBuilder $routes) {
    $routes->scope('/api/v1', function (RouteBuilder $routes) {
       
        $routes->connect('/test', ['controller' => 'Student', 'action' => 'test']);
        $routes->post('/addStudent', ['controller' => 'Student', 'action' => 'addStudent']);
        $routes->get('/getStudents', ['controller' => 'Student', 'action' => 'getStudents']);
        
        $routes->put('/updateStudentById/:id', ['controller' => 'Student', 'action' => 'updateStudentById'])->setPass(['id']);
        $routes->get('/getStudentById/:id', ['controller' => 'Student', 'action' => 'getStudentById'])->setPass(['id']);
        $routes->delete('/deleteStudentById/:id', ['controller' => 'Student', 'action' => 'deleteStudentById'])->setPass(['id']);


    });
};