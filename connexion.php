<?php 
try{
    $bdd = new PDO('mysql:host=localhost;dbname=3idg;charset=utf8','root', '');
  }   
  catch(PDOException $e){
     print "Erreur !:". $e->getMessage();
     die();
  }
?>