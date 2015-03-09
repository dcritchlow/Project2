<?php

use Common\Authentication\Persistence\FileBased;

class FileBasedTest extends \Codeception\TestCase\Test
{
    use Codeception\Specify;

    protected $auth;

    public function testNewFileBasedPersistenceIsCreated()
    {
        $this->specify('Create new FileBased Persistence', function() {
            expect_that(new FileBased());
        });
    }

    public function testNewFileBasedAuthenticationWithJoe()
    {
        $this->specify('Authenticate user joe', function() {
            $auth = new FileBased();
            expect("Welcome joe!", $auth->authenticate('joe', '1234pass'));
        });
    }

    public function testNewFileBasedAuthenticationUnauthorized()
    {
        $this->specify('Unauthorized user ', function() {
            $auth = new FileBased();
            expect("Not Authorized", $auth->authenticate('dave', '1234pass'));
        });
    }

    public function testNewFileBasedAuthenticationBadPassword()
    {
        $this->specify('Bad password with user joe', function() {
            $auth = new FileBased();
            expect("Not Authorized", $auth->authenticate('joe', '1234pass1'));
        });
    }

}