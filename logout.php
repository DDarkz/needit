<?php 

session_start();
session_destroy();
header("location: annonces.php");

?>