<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</Cadastre-se></title>
</head>
<body>
    <div>
        <h2>Cadastro de Usuário</h2>
        <form action="" method="post">
            <label for="">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <label for="">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="">Senha</label>
            <input type="password" name="senha" id="senha" required>

            <label for="">Perfil:</label>
            <select name="perfil" id="perfil">
                <option value="admin">Admin</option>
                <option value="gestor">Gestor</option>
                <option value="colaborador">Colaborador</option>
            </select>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>