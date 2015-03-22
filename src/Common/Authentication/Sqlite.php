<?php

namespace Common\Authentication;

use PDO;
use PDOException;
use Views\Welcome;
use Common\Exceptions\LoginException;

class Sqlite implements IAuthentication
{
    protected $db;
    protected $username;
    protected $password;
    protected $srcDir;

    public function __construct($username='', $password='')
    {
        $srcDir = realpath(dirname(__FILE__) . '/');
        $this->db = new PDO('sqlite:test.db');
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate($username, $password)
    {
        try
        {

            $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

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