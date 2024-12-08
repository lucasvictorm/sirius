<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <main>
 
</form>
        <img src="./imagens/sirius-logo-black.png" alt="Logo Sirius">
        <form action="authentication.php" method="post">
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