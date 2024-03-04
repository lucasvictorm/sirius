<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <main>

        <img src="./imagens/sirius-logo.png" alt="Logo Sirius">
        <form action="authentication.php" method="post">
            <div>
                <label for="login">Login</label>
                <input type="number" maxlength="5" id="login" name="login">

            </div>
            
            <div>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">
                
            </div>
            <div>
            <input type="submit" value="Entrar">
            </div>
            
            
        </form>
    </main>
</body>
</html>