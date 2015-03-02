<?php

namespace Common\Authentication;

use Common\Authentication\Persistence\InMemory;

class PersistenceFactory implements FactoryInterface
{

    public function create()
    {
        return new InMemory();
    }

    public function createInMemoryPersistence()
    {
        return new InMemory();
    }
}