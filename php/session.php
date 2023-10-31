<?php 

session_start();

header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");

if (!isset($_SESSION['nombre_usu']) != "0") {
    header('Location: Login.php');
}
