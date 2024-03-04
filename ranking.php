<?php include "./conexao.php"?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="ranking.css">
</head>
<body>
    <?php include "./header.php"?>
    
    <main>
    <h1>Ranking</h1>
    <?php 

        $sql = mysqli_query($conexao, "Select nome, pontos from unidades order by pontos desc");

        
        while($unidades = mysqli_fetch_assoc($sql)){
            echo("<div class='unidade'>
        <h2>".$unidades['nome']."</h2>
        <p>".$unidades['pontos']." Pontos</p>
    </div>");
        }
        
    
    ?>
    </main>

</body>
</html>