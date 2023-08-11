<?php // src/Middleware/CheckFiveMiddleware.php
namespace App\Middleware;

use Cake\Http\Response;
use Cake\Http\ServerRequest;

class my_middleware
{
    public function __invoke(ServerRequest $request, Response $response, $next)
    {
        // Your logic here
        if (5 == 5) {
            $response->getBody()->write('5 is indeed equal to 5!');
            
            // Call the next middleware or the controller's action
            $response = $next($request, $response);
            
        } else {
            $response->getBody()->write('5 is not equal to 5.');
        }

        return $response;
    }
}
