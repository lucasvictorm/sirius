<?php 
 include "../database/conexao.php";
session_start();
$id_unidade = $_SESSION["unidade_id"];
$desafio_id = $_POST["desafio_id"];
$relatorio = $_POST["relatorio"];
if(isset($_FILES['foto'])){
    $imagem = $_FILES['foto'];
    if($imagem['size'] > 250000){
        die("Tamanho máximo permitido: 2Mb");
    }
    if($imagem['error']){
        die('Erro ao enviar arquivo');
    }
    //var_dump($imagem);



    $nomeFoto = $imagem['name'];
    $novoNomeFoto = uniqid();
    $formato = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
    
    if($formato != 'jpg' && $formato != 'png'){
        die('Formato de arquivo inválido');
    }


    $nome_unidade = mysqli_fetch_assoc(mysqli_query($conexao, "select nome from unidades where id = $id_unidade"));
    $pasta = "../imagens/".strtolower($nome_unidade['nome']."/");
    move_uploaded_file($imagem["tmp_name"], $pasta.$novoNomeFoto.".".$formato);
    $caminho = $pasta.$novoNomeFoto.".".$formato;
    
    mysqli_query($conexao, "insert into enviados (id_desafio, id_unidade, path_img, nome_img, relatorio) values ($desafio_id, $id_unidade, '$caminho', '$nomeFoto', '$relatorio')");
    mysqli_query($conexao, "UPDATE desafios_unidades set status = 'enviado' where id_desafio = $desafio_id and id_unidade = $id_unidade");

    echo("<script>window.location = '../index.php'</script>");

}

/*mysqli_query($conexao, "UPDATE desafios_unidades set status = 'enviado' where id_desafio = $desafio_id and id_unidade = $id_unidade");

mysqli_query($conexao, "insert into enviados (id_desafio, id_unidade, path_img, nome_img, relatorio) values ($desafio_id, $id_unidade)");*/

/*echo("<script>window.location = './index.php'</script>");*/




?>
