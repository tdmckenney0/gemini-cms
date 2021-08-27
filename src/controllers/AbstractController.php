<?php

namespace App\Controllers;

use TitanII\Request;
use TitanII\Response;

/**
 * Abstract Controller class. 
 */
abstract class AbstractController
{
    /**
     * Incoming Request.
     */
    protected Request $request; 

    /**
     * Constructor 
     * 
     * @param Request The Titan-II Request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}