<?php 

include './conexao.php';

$nome = $_POST['nomeUnidade'];
$login = $_POST['login'];
$senha = $_POST['senha'];


mysqli_query($conexao, "INSERT into unidades (nome, login, senha, pontos) values ('$nome', $login, '$senha', 0)");
$unidade_id = mysqli_insert_id($conexao);

mysqli_query($conexao, "insert into desafios_unidades (id_desafio, id_unidade, status) select id, $unidade_id, 'pendente' from desafios");


echo("<script>window.location = './index.php'</script>");
?>