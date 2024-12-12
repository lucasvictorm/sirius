<?php 

include '../database/conexao.php';
require_once '../models/desafiosModel.php';

$id = $_GET['id'];

$desafio = new UnidadeModel($conexao);

$desafio->excluirUnidade($id);

echo("<script>window.location = '../pages/gerenciarUnidades.php'</script>");

?>