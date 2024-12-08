<?php include "../database/conexao.php"?>
<?php include '../includes/head.php'?>
    <title>Ranking</title>
    <link rel="stylesheet" href="../assets/css/ranking.css">
</head>
<body>
    <?php include "../includes/header.php"?>
    
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