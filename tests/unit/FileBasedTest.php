<?php

use Common\Authentication\Persistence\FileBased;

class FileBasedTest extends \Codeception\TestCase\Test
{
    use Codeception\Specify;

    protected $auth;

    public function testNewFileBasedPersistenceIsCreated()
    {
        $this->specify('Create new FileBased Persistence', function() {
            verify_that(new FileBased());
        });
    }

    public function testNewFileBasedAuthenticationWithJoe()
    {
        $this->specify('Authenticate user joe', function() {
            $auth = new FileBased();
            verify_that($auth->authenticate('joe', '1234pass'));
        });
    }

    public function testNewFileBasedAuthenticationUnauthorized()
    {
        $this->specify('Unauthorized user ', function() {
            $auth = new FileBased();
            $auth->authenticate('dave', '1234pass');
        }, ['throws' => 'Common\Exception\LoginException']);
    }

    public function testNewFileBasedAuthenticationBadPassword()
    {
        $this->specify('Bad password with user joe', function() {
            $auth = new FileBased();
            $auth->authenticate('joe', '1234pass1');
        }, ['throws' => 'Common\Exception\LoginException']);
    }

}