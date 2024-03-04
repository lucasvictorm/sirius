<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="authentication.php" method="post">

        <label for="login">Login</label>
        <input type="number" maxlength="5" id="login" name="login">
        <br>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>