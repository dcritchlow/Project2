<?php

namespace Common\Authentication;

use PDO;

class MySQL
{
    protected $db;
    protected $username;
    protected $password;
    public function __construct($db, $username = '', $password = '')
    {
        $this->db = $db;
        $this->username = $username;
        $this->password = $password;
    }
    public function authenticate($username, $password)
    {
        try
        {
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
            return "Welcome ".$username."!";
        }
        catch(\PDOException $ex)
        {
            echo ' Error was caught '.$ex->getMessage();
        }
    }
}