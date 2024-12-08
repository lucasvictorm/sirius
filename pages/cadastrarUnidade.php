
<?php include '../includes/head.php'?>
    <title>Cadastrar unidade</title>
    <link rel="stylesheet" href="../assets/css/cadastrarUnidade.css">
</head>
<body>
<?php 

include '../includes/header.php'
?>
    <main>
        <h2>Cadastrar unidade</h2>    
        <form action="../actions/cadastraUnidade.php" method="post">

            <div class="mb-3">
                <label for="nomeDesafio" class="form-label">Nome da unidade</label>
                <input type="text" class="form-control" name="nomeUnidade" id="nomeUnidade" placeholder="Escreva aqui...">
            </div>
            <div class="mb-3">
                <label for="nomeDesafio" class="form-label">Login</label>
                <input type="number" class="form-control" name="login" id="login">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="senha" class="form-control" name="senha" id="senha">
            </div>
            
            <button type="submit" class="btn btn-success">Cadastrar unidade</button>

        </form>
    </main>
    
</body>
</html>