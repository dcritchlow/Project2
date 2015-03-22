<?php

namespace Common\Authentication;

class PersistenceFactory implements IFactory
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

    public function createMySQLPersistence($config)
    {
        return new MySQL($config);
    }

    public function createSqlitePersistence($config)
    {
        return new Sqlite($config);
    }
}