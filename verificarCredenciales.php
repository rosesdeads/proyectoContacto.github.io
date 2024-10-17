<?php
session_start();

if(!isset($_SESSION['logeado'])){
    header("Location:index.php");
    exit();
}
?>
