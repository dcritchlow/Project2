<?php

namespace Common\Authentication;

use Common\Authentication\Persistence\InMemory;
use Common\Authentication\Persistence\FileBased;

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

    public function createFileBasedPersistence()
    {
        return new FileBased();
    }
}