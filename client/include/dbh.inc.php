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

    function checkIfEmailExist($email)
    {
        $sql = "SELECT id FROM client WHERE email='$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function checkIfUsernameExist($username)
    {
        $sql = "SELECT id FROM client WHERE username='$username'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result);
    }

    function registerAccount($info)
    {
        $query = "INSERT INTO client(firstName, lastName, username, password, email, contact_no, house_no, street, baranggay, municipality, province) 
        VALUES ('$info->firstName' , '$info->lastName', '$info->username',
        '$info->password', '$info->email', '$info->contact', '$info->houseNo', '$info->street', '$info->baranggay', '$info->municipality', '$info->province')";
        //$this->addActivities($info->firstName + ' ' + $info->lastName, "Account", "Creat an account with student number $info->username");
        return mysqli_query($this->conn, $query);
    }
    function __destroy()
    {
        $this->conn->close();
    }
}
