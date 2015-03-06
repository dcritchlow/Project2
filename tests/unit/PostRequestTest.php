<?php


use Common\Request\PostRequest;

class PostRequestTest extends \Codeception\TestCase\Test
{
    use \Codeception\Specify;

    public function testPostRequestGetMethods()
    {
        $postArray = ["username"=>"joe", "password"=>"1234pass", "auth"=>"in-memory"];
        $request = new PostRequest($postArray);

        $this->assertEquals('joe', $request->getUserName());
        $this->assertEquals('1234pass', $request->getPassword());
        $this->assertEquals('in-memory', $request->getAuthMethod());

    }

    public function testUsernameValidation()
    {
        $this->specify("username is required", function(){
            $this->setExpectedException('Common\Exception\LoginException',
                'ERROR: no username dependency in Common\Request\PostRequest::__construct on line 15');
            $postArray = ["password"=>"1234pass", "auth"=>"in-memory"];
            $this->getExpectedException($req = new PostRequest($postArray));
        });
    }

    public function testPasswordValidation()
    {
        $this->specify("password is required", function(){
            $this->setExpectedException('Common\Exception\LoginException',
                'ERROR: no password dependency in Common\Request\PostRequest::__construct on line 19');
            $postArray = ["username"=>"joe", "auth"=>"in-memory"];
            verify($this->getExpectedException($req2 = new PostRequest($postArray)));
        });
    }

    public function testPasswordLengthNotLessThan8()
    {
        $this->specify("password length must be 8 characters", function() {
            $this->setExpectedException('Common\Exception\LoginException',
                'ERROR: password must be 8 characters Common\Request\PostRequest::__construct on line 31');
            $postArray = ["username" => "joe", "password" => "1234", "auth" => "in-memory"];
            verify($this->getExpectedException($req2 = new PostRequest($postArray)));

            $this->setExpectedException('Common\Exception\LoginException',
                'ERROR: password must be 8 characters Common\Request\PostRequest::__construct on line 31');
            $postArray = ["username" => "joe", "password" => "1234pass", "auth" => "in-memory"];
            verify($this->getExpectedException($req2 = new PostRequest($postArray)));
        });
    }

    public function testPasswordLengthNotMoreThan8()
    {
        $this->specify("password length must be 8 characters", function() {
            $this->setExpectedException('Common\Exception\LoginException',
                'ERROR: password must be 8 characters Common\Request\PostRequest::__construct on line 34');
            $postArray = ["username" => "joe", "password" => "1234pass12pa", "auth" => "in-memory"];
            verify($this->getExpectedException($req2 = new PostRequest($postArray)));
        });
    }

    public function testAuthMethodValidation()
    {
        $this->specify("auth method is required", function(){
            $this->setExpectedException('Common\Exception\LoginException',
                'ERROR: authentication method was not chosen Common\Request\PostRequest::__construct on line 37');
            $postArray = ["username"=>"joe", "password"=>"1234pass"];
            $this->getExpectedException($req2 = new PostRequest($postArray));
        });
    }

}