<?php include '../includes/head.php'?>
    <link rel="stylesheet" href="../assets/css/inserirDesafio.css">
    <title>Inserir desafio</title>
</head>
<body>
<?php 

include '../includes/header.php'
?>
    <main>
        <h2>Inserir desafio</h2>    
        <form action="../actions/insereDesafio.php" method="post">

            <div class="mb-3">
                <label for="nomeDesafio" class="form-label">Nome do desafio</label>
                <input type="text" class="form-control" name="nomeDesafio" id="nomeDesafio" placeholder="Escreva aqui...">
            </div>
            <div class="mb-3">
                <label for="pontos" class="form-label">Pontuação</label>
                <input type="number" class="form-control" name="pontos" id="pontos">
            </div>

            <button type="submit" class="btn btn-success">Inserir Desafio</button>

        </form>
    </main>
    
</body>
</html>