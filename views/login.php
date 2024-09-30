<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <title>Login</title>
</head>
<body>
    <main>
        <form action="index.php?action=login" method="post">
            <!--cria duas seções diferentes-->
            <section>
                <label for="">Email</label>
                <input type="email" name="email" placeholder="email" required>
            </section>
            <section>
                <label for="">Senha</label>
                <input type="password" name="senha" placeholder="Senha" required>
            </section>
            <button type="submit">Login</button>
        </form>
        <a href="index.php?action=register">Cadastre-se</a>
    </main>
</body>
</html>