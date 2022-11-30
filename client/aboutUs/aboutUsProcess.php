<?php 
session_start();

if(isset($_POST["checkLogin"])){
     if(isset($_SESSION['id'])){
        echo "hanna";
     }else{
        echo "banana";
     }
}