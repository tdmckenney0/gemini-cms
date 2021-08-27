<?php

namespace App\Servers;

use TitanII\Request;
use TitanII\Response;

use App\PagesController;

class DefaultServer extends AbstractServer
{
    /**
     * Route incoming requests. 
     * 
     * @param Request
     * 
     * @return Response
     */
    public function route(Request $request): Response
    {
        $path = $request->tokenizePath();
        $response = new Response();
        $action = array_shift($path);

        // We're only using the pages controller for now. 
        $controller = new PagesController($request);

        if (method_exists($controller, $action)) {
            $response = $controller->{$action}(...$path);
        } else {
            $response->setCode(30);
            $response->setMeta('/index');
        }

        echo sprintf('[%s %s]: %s' . PHP_EOL, $response->getCode(), $response->getMeta(), $request);

        return $response;
    }
}