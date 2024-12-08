<?php 

include "../database/conexao.php";

$nome = $_POST['nomeDesafio'];
$pontos = $_POST['pontos'];


mysqli_query($conexao, "INSERT into desafios (nome, pontos) values ('$nome', '$pontos')");
$desafio_id = mysqli_insert_id($conexao);

mysqli_query($conexao, "insert into desafios_unidades (id_desafio, id_unidade, status) select $desafio_id, id, 'pendente' from unidades");


echo("<script>window.location = '../index.php'</script>");
?>