<?php

use Common\Authentication\Persistence\InMemory;

class InMemoryTest extends \Codeception\TestCase\Test
{
    use Codeception\Specify;

    protected $auth;

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
            expect("Welcome joe!", $auth->authenticate('joe', '1234pass'));
        });
    }

    public function testNewInMemoryAuthenticationUnauthorized()
    {
        $this->specify('Unauthorized user ', function() {
            $auth = new InMemory();
            expect("Not Authorized", $auth->authenticate('dave', '1234pass'));
        });
    }

    public function testNewInMemoryAuthenticationBadPassword()
    {
        $this->specify('Bad password with user joe', function() {
            $auth = new InMemory();
            expect("Not Authorized", $auth->authenticate('joe', '1234pass1'));
        });
    }

}