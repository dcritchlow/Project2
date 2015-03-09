<?php

use Common\Authentication\PersistenceFactory;

class PersistenceFactoryTest extends \Codeception\TestCase\Test
{
    use Codeception\Specify;

    public function testDefaultCreatePersistence()
    {
        $this->specify('Default Persistence is created', function() {
            $persist = new PersistenceFactory();
            expect_that($persist->create());
        });
    }

    public function testCreateInMemory()
    {
        $this->specify('InMemory Persistence is created', function() {
            $persist = new PersistenceFactory();
            expect_that($persist->createInMemoryPersistence());
        });
    }

    public function testCreateFileBased()
    {
        $this->specify('FileBased Persistence is created', function() {
            $persist = new PersistenceFactory();
            expect_that($persist->createFileBasedPersistence());
        });
    }
}