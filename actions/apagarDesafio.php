<?php 

include '../database/conexao.php';
require_once '../models/desafiosModel.php';

$id = $_GET['id'];

$desafio = new DesafiosModel($conexao);

$desafio->apagarDesafio($id);

echo("<script>window.location = '../pages/gerenciarDesafios.php'</script>");

?>