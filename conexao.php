<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $banco = "sirius";
    $conexao = mysqli_connect($host, $user, $pass, $banco) or die(mysqli_error($conexao));
    if(!$conexao){
        die(mysqli_connect_error());
    }
?>