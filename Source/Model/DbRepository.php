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

    function __destruct()
    {
        $this->hostname   = null;
        $this->dbUser     = null;
        $this->dbPassword = null;
        $this->dbName     = null;
        $this->sqlCon     = null;
  	}	

    protected function open() 
    {
        $this->sqlCon = new mysqli($hostname, $dbUser, $dbPassword, $dbName);

        if ($sqlCon->connect_errno) {
            echo "MySQL connection failed: " . $sqlCon->connect_errno . " - " . $sqlCon->connect_error;
        }
    }

    private function close()
    {
        $this->sqlCon->close();
    }
}

?>