<?php

use Common\Exception\LoginException;

class LoginExceptionTest extends \Codeception\TestCase\Test
{
    use Codeception\Specify;

    public function testLoginExceptionIsThrown()
    {
        $this->specify('', function() {
            throw new LoginException('I am a test');
        }, ['throws' => 'Common\Exception\LoginException']);
    }
}