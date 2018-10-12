<?php

abstract class DbRepository
{
    private $hostname   = null;
    private $dbUser     = null;
    private $dbPassword = null;
    private $dbName     = null;
    protected $sqlCon   = null;

    protected function __construct($hostname, $user, $pass, $db)
    {
        $this->hostname     = $hostname;
        $this->dbUser       = $user;
        $this->dbPassword   = $pass;
        $this->dbName       = $db;
    }

    protected function __destruct()
    {
        $this->hostname   = null;
        $this->dbUser     = null;
        $this->dbPassword = null;
        $this->dbName     = null;
        $this->sqlCon     = null;
  	}

    protected function open() 
    {
        $this->sqlCon = new mysqli(
            $this->hostname, 
            $this->dbUser, 
            $this->dbPassword, 
            $this->dbName);

        if ($this->sqlCon->connect_errno) { // TODO Error handling
            echo "MySQL connection failed: " 
                . $this->sqlCon->connect_errno 
                . " - " . $this->sqlCon->connect_error;
        }
    }

    protected function close()
    {
        $this->sqlCon->close();
    }
}

?>