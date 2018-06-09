<?php
/**
 * Created by PhpStorm.
 * User: p.lukengu
 * Date: 6/8/2018
 * Time: 12:00 PM
 */

namespace  Api;
use Doctrine\ORM\EntityManager;

abstract  class AbstractResource
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager = null;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}