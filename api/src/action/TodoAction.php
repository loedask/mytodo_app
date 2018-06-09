<?php
/**
 * Created by PhpStorm.
 * User: p.lukengu
 * Date: 6/8/2018
 * Time: 11:31 AM
 */

namespace  Api\action;
use Api\resource\TodoResource;

final class TodoAction
{
    private $todoResource;

    public function __construct(TodoResource $todoResource)
    {
        $this->todoResource = $todoResource;
    }

    public function fetch($response)
    {
        $todos = $this->todoResource->get();
        return $response->withJSON($todos)->getBody();
    }


    public function fetchOne($response, $args)
    {
        $todo = $this->todoResource->get($args['id']);
        if ($todo) {
            return $response->withJSON($todo)->getBody();
        }
        return $response->withStatus(404, 'No todo found with that id.');
    }


}