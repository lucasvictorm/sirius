<?php 

include '../database/conexao.php';

$nome = $_GET['nomeUnidade'];
$pontos = $_GET['pontosUnidade'];
$id = $_GET['idUnidade'];


mysqli_query($conexao, "update unidades set nome = '$nome', pontos = '$pontos' where id = $id");

echo("<script>window.location = '../pages/gerenciarUnidades.php'</script>");

?>