<?php 
include "./conexao.php";

    $unidadeId = $_POST['uid'];
    $desafioId = $_POST['did'];
    $pontosDesafio = $_POST['pontos'];
    $pontosUnidade = $_POST['pontosUnidade'];

    mysqli_query($conexao, "UPDATE desafios_unidades set status ='concluido' where id_desafio = $desafioId and id_unidade = $unidadeId");

    $soma = $pontosDesafio + $pontosUnidade;
    
    mysqli_query($conexao, "UPDATE unidades set pontos = $soma where id = $unidadeId");

    echo("<script>window.location = './index.php'</script>");
?>
