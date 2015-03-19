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

    public function createMySQLPersistence($dbMySQL)
    {
        return new MySQL($dbMySQL);
    }

    public function createSqlitePersistence()
    {
        return new Sqlite();
    }
}