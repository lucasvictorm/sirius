
<?php include '../includes/head.php'?>
    
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <main>
 
</form>
        <img src="../imagens/sirius-logo-black.png" alt="Logo Sirius">
        <form action="../actions/authentication.php" method="post">
        <div class="mb-3">
            <label for="login" class="form-label text-dark">Login</label>
            <input maxlength="5" type="number" class="form-control" id="login" aria-describedby="loginHelp" name="login">
    
         </div>
            
        <div class="mb-3">
            <label for="senha" class="form-label text-dark">Senha</label>
            <input type="password" class="form-control" id="senha" aria-describedby="loginHelp" name="senha">
    
        </div>

        <div>
            <input type="submit" value="Entrar">
        </div>
            
            
        </form>
    </main>
</body>
</html>