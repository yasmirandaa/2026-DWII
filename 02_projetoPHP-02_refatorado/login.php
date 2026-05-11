<?php
    require_once __DIR__ . '/includes/auth.php';
    require_once __DIR__ . '/includes/conexao.php';

    redirecionar_se_logado();

    $erro = '';
    $login = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_SESSION['bloqueado_ate']) && time() < $_SESSION['bloqueado_ate']) {

            $erro = 'Muitas tentativas. Tente novamente mais tarde.';

        } else {

            $login = trim($_POST['login'] ?? '');
            $senha = trim($_POST['senha'] ?? '');

            $pdo = conectar();

            $stmt = $pdo->prepare("
                SELECT id, login, senha 
                FROM usuarios
                WHERE login = :login
                AND status = 'ativo'
                LIMIT 1
            ");

            $stmt->execute([
                'login' => $login
            ]);

            $usuario = $stmt->fetch();

            if ($usuario && password_verify($senha, $usuario['senha'])) {

                session_regenerate_id(true);

                $_SESSION['usuario'] = $usuario['login'];
                $_SESSION['logado_em'] = date('d/m/Y \à\s H:i');
                $_SESSION['flash'] = "Bem-vindo, {$usuario['login']}!";
                $_SESSION['tentativas'] = 0;

                $log = $pdo->prepare("
                    INSERT INTO logs 
                    (tabela_afetada, registro_id, acao, usuario_login, detalhes)
                    VALUES
                    ('usuarios', :id, 'LOGIN', :login, 'Login realizado com sucesso')
                ");

                $log->execute([
                    'id' => $usuario['id'],
                    'login' => $usuario['login']
                ]);

                header('Location: painel.php');
                exit;

            } else {

                $erro = 'Usuário ou senha incorretos.';

                $_SESSION['tentativas'] = ($_SESSION['tentativas'] ?? 0) + 1;

                if ($_SESSION['tentativas'] >= 3) {

                    $_SESSION['bloqueado_ate'] = time() + 60;
                    $_SESSION['tentativas'] = 0;
                }

                $log = $pdo->prepare("
                    INSERT INTO logs
                    (tabela_afetada, registro_id, acao, usuario_login, detalhes)
                    VALUES
                    ('usuarios', 0, 'LOGIN_FAIL', :login, 'Credenciais inválidas')
                ");

                $log->execute([
                    'login' => $login
                ]);
            }
        }
    }

    $pagina_atual = 'login';
    $titulo_pagina = 'Login - Portfólio';
    $caminho_raiz = './';
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
    </head>
    <body>

    <div class="container">
        <div class="form-container">
            <h1 class="titulo-secao"> Área Restrita </h1>
            <?php if ($erro): ?>
                <div class="alerta-erro">
                    <p style="margin: 0; font-size: 14px;">
                        <?php echo htmlspecialchars($erro); ?>
                    </p>
                </div>
            
            <?php endif; ?>
            
            <form action="login.php" method="post">
                <label>Usuário:</label>
                <input type="text" name="usuario" value="<?php echo htmlspecialchars($login); ?>" autocomplete="username">
                <label>Senha:</label>
                <input type="password" name="senha" autocomplete="current-password">
                <button type="submit">Entrar</button>
            </form>

            <p class=link-volta><a href="../index.php">Voltar ao início</a></p>

           
        </div>

    </div>

    <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>
        

            