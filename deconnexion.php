<?php
include('connexion.php');
session_start();
$id = $_SESSION['email'];
session_destroy();
$req = 'UPDATE utilisateur set connecte=0 where id_user= "'.$id.'"';
mysqli_query($dbc, $req); 
echo $id;
//header("location: admin/login.php");
?>