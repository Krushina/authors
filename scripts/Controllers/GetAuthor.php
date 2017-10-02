<?php

namespace App\Controllers;
use Slim\Http\Request as Request;
use Slim\Http\Response as Response;

/**
 * Created by PhpStorm.
 * User: sorriso
 * Date: 30.09.17
 * Time: 21:39
 */

class GetAuthor
{
    protected $authorsModel;

    public function __construct($authorsModel)
    {
        $this->authorsModel = $authorsModel;
    }

    public function __invoke(Request $request, Response $response, $args = [])
    {
        $result = ['id' => 1];

       return $response->withJson($result);

    }
}
