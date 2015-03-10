<?php

namespace Common\Authentication;

use Common\Authentication\Persistence\InMemory;
use Common\Authentication\Persistence\FileBased;
use Common\Authentication\Persistence\MySQL;

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

    public function createMySQLPersistence($db)
    {
        return new MySQL($db);
    }
}