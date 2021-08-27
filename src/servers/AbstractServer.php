<?php

namespace App\Servers;

use TitanII\Server as TitanIIServer;
use TitanII\Request;
use TitanII\Response;

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * A Gemini server that serves out a group of controllers and other things.
 */
abstract class AbstractServer 
{
    /**
     * Database container. 
     */
    protected Capsule $capsule;

    /**
     * Titan-II Server
     */
    protected TitanIIServer $server;

    /**
     * Database Configuration.
     */
    private array $connection;

    /**
     * Constructor
     */
    public function __construct()
    {
        // Make a new server and capsule.
        $this->server = new TitanIIServer();
        $this->capsule = new Capsule;

        // Import the connection
        $this->connection = include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php');

        // Add all Connections. 
        $this->capsule->addConnection($this->connection);
        
        // Set the event dispatcher used by Eloquent models... (optional)
        $this->capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $this->capsule->setAsGlobal();
        
        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $this->capsule->bootEloquent();

        // Set the Cers
        $this->server->setCert(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'certs' . DIRECTORY_SEPARATOR . 'cert.pem');
        $this->server->setKey(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'certs' . DIRECTORY_SEPARATOR . 'key.rsa');

        // Set the server handler. 
        $this->server->setHandler([$this, 'route']);

        // Start the Titan-II server
        $this->server->start();
    }

    /**
     * Route incoming requests. 
     * 
     * @param Request
     * 
     * @return Response
     */
    abstract public function route(Request $request): Response;
}
