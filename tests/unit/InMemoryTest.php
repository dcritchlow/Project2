<?php

use Common\Authentication\Persistence\InMemory;

class InMemoryTest extends \Codeception\TestCase\Test
{
    use Codeception\Specify;

    public function testNewInMemoryPersistenceIsCreated()
    {
        $this->specify('Create new InMemory Persistence', function() {
            expect_that(new InMemory());
        });
    }

    public function testNewInMemoryAuthenticationWithJoe()
    {
        $this->specify('Authenticate user joe', function() {
            $auth = new InMemory();
            verify_that($auth->authenticate('joe', '1234pass'));
        });
    }

    public function testNewInMemoryAuthenticationUnauthorized()
    {
        $this->specify('Unauthorized user ', function() {
            $auth = new InMemory();
            $auth->authenticate('dave', '1234pass');
        }, ['throws' => 'Common\Exception\LoginException']);
    }

    public function testNewInMemoryAuthenticationBadPassword()
    {
        $this->specify('Bad password with user joe', function() {
            $auth = new InMemory();
            $auth->authenticate('joe', '1234pass1');
        }, ['throws' => 'Common\Exception\LoginException']);
    }

}