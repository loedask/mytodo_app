<?php
/**
 * Created by PhpStorm.
 * User: p.lukengu
 * Date: 6/8/2018
 * Time: 12:13 PM
 */

namespace Api\resource;
use  Api\AbstractResource;

class TodoResource extends AbstractResource
{
    public function get($id = null)
    {
        if ($id === null) {
            $todos = $this->entityManager->getRepository('Api\Entity\Todo')->findAll();
            $todos = array_map(
                function ($todo) {
                    return $todo->getArrayCopy();
                },
                $todos
            );

            return $todos;
        } else {
            $todo = $this->entityManager->getRepository('Api\Entity\Todo')->findOneBy(
                array('id' => $id)
            );
            if ($todo) {
                return $todo->getArrayCopy();
            }
        }

        return false;
    }

}