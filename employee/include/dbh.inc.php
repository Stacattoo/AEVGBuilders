<?php
session_start();
class dbHandler
{

    public $conn;

    function __construct()
    {

        $dbservername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "aevgbuildersdb";
        $this->conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
