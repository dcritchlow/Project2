<?php

namespace Common\Authentication;

use PDO;
use PDOException;
use Views\Welcome;
use Common\Exceptions\LoginException;

class Sqlite implements IAuthentication
{
    protected $config;
    protected $db;
    protected $username;
    protected $password;

    public function __construct($config=[], $username='', $password='')
    {
        $this->config = $config;

        if(empty($this->config))
        {
            throw new \InvalidArgumentException(
                __METHOD__.': $config cannot be empty'
            );
        }
        $this->db = new PDO('sqlite:'.$this->config['app']['db']['sqlite']);
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate($username, $password)
    {
        try
        {
            $this->db->setAttribute(
                PDO::ATTR_ERRMODE,
                $this->config['app']['db']['errorLevel']
            );

            $stmt = $this->db->prepare('SELECT name, password FROM user WHERE name = :name');
            $stmt->bindParam(':name', $username, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if (!$result)
            {
                throw new LoginException('ERROR: Incorrect username');
            }
            if (!password_verify($password, $result->password))
            {
                throw new LoginException('ERROR: Incorrect password');
            }

            return new Welcome();
        }
        catch(PDOException $ex)
        {
            echo ' Error was caught '.$ex->getMessage();
        }
    }
}