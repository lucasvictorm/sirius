<?php 
 include "../database/conexao.php";

    $unidadeId = $_POST['uid'];
    $desafioId = $_POST['did'];
   

    mysqli_query($conexao, "UPDATE desafios_unidades set status = 'pendente' where id_desafio = $desafioId and id_unidade = $unidadeId");

    
    mysqli_query($conexao, "DELETE FROM enviados WHERE enviados.id_desafio = $desafioId and enviados.id_unidade = $unidadeId");

    echo("<script>window.location = '../index.php'</script>");
?>
