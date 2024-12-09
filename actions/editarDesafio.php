<?php 

include '../database/conexao.php';

$nome = $_GET['nomeDesafio'];
$pontos = $_GET['pontosDesafio'];
$id = $_GET['idDesafio'];


mysqli_query($conexao, "update desafios set nome = '$nome', pontos = '$pontos' where id = $id");

echo("<script>window.location = '../pages/gerenciarDesafios.php'</script>");

?>