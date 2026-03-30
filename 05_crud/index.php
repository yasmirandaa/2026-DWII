<?php
    require_once __DIR__ . '/../04_sessoes/includes/auth.php';
    requer_login();

    require_once __DIR__ . '/includes/conexao.php';

    $pdo = conectar();
    $stmt = $pdo->query('SELECT * FROM projetos ORDER BY criado_em DESC');
    $projetos = $stmt->fetchAll();

    $cadastroOk = isset($_GET['cadastro']) && $_GET['cadastro'] === 'ok';
    $titulo_pagina = 'Meus Projetos - Portfólio';
    $caminho_raiz = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>
    <div class="container">
            <div>
                <h1 class="titulo-secao" style="margin: 0;">Meus Projetos</h1>
                <a href="cadastrar.php" class="btn-primario">Novo Projeto</a>
            </div>
        <?php if ($cadastroOk): ?>
            <div class="alerta-sucesso">
                <p style="margin: 0;"> Projeto cadastrado com sucesso!</p>
            </div>
        <?php endif; ?>
        
        <?php if (empty($projetos)): ?>
            <div class="card">
                <p>Nenhum projeto cadastrado ainda.</p>
                <a href="cadastrar.php" class="btn-primario">Cadastrar o primeiro projeto</a>
            </div>
        <?php else: ?>
            <div>
                <?php foreach ($projetos as $projeto): ?>
                    <div class="card">
                        <h3>
                            <?php echo htmlspecialchars($projeto['nome']); ?>
                        </h3>
                        <p> 
                            <?php echo htmlspecialchars($projeto ['descricao']); ?>
                        </p>
                        <p>
                            <?php echo htmlspecialchars($projeto ['tecnologias']); ?>
                        </p>
                        <p>
                            <?php echo htmlspecialchars($projeto ['ano']); ?>
                        </p>
                        <?php if ($projeto ['link_github']): ?>
                            echo htmlspecialchars ($projeto ['link_github']); ?>" target="_blank" rel="noopener noreferrer" class="btn-secundario"> Ver no GitHub</a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <p>
                <?php echo count($projetos); ?> projeto(s) cadastrado(s)</p>
        <?php endif; ?>
    </div>
    <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>