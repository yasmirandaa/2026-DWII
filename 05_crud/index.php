<?php
    require_once __DIR__ . '/../04_sessoes/includes/auth.php';
    requer_login();

    require_once __DIR__ . '/includes/conexao.php';
    
    $pdo = conectar();
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

    if ($pagina < 1) {
        $pagina = 1;
    }

    $limite = 3;
    $offset = ($pagina - 1) * $limite;

    $total = $pdo->query("SELECT COUNT(*) FROM projetos")->fetchColumn();

    $stmt = $pdo->prepare("SELECT * FROM projetos ORDER BY criado_em DESC LIMIT :limite OFFSET :offset");
    $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

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
            <h1>Meus Projetos</h1>
            <form method="GET">
                <input type="text" name="busca" placeholder="Buscar...">
                <button type="submit">Buscar</button>
            </form>
            <a class="voltar" href="cadastrar.php">+ Novo Projeto</a>
        </div>
        <?php if ($cadastroOk): ?>
            <div>
                <p> Projeto cadastrado com sucesso!</p>
            </div>
        <?php endif; ?>
        
        <?php if (empty($projetos)): ?>
            <div class="card">
                <p>Nenhum projeto cadastrado ainda.</p>
                <a href="cadastrar.php">Cadastrar o primeiro projeto</a>
            </div>
        <?php else: ?>
            <div>
                <?php foreach ($projetos as $projeto): ?>
                    <div class="card">
                        <h3>
                            <?php echo htmlspecialchars($projeto['nome']); ?>
                        </h3>
                        <p>
                            <?php echo htmlspecialchars($projeto['tecnologias']); ?>
                        </p>
                        <a class="detalhes" href="detalhe.php?id=<?php echo (int)$projeto['id']; ?>">
                            Ver detalhes
                        </a>
                        <?php if ($projeto ['link_github']): ?>
                            <a>echo htmlspecialchars ($projeto ['link_github']); ?>" target="_blank" rel="noopener noreferrer" class="voltar"> Ver no GitHub</a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="paginacao">
                <?php if ($pagina > 1): ?>
                    <a href="?pagina=<?php echo $pagina - 1; ?>" class="btn-pag">⬅ Anterior</a>
                <?php endif; ?>

                <?php if ($offset + $limite < $total): ?>
                    <a href="?pagina=<?php echo $pagina + 1; ?>" class="btn-pag proximo">Próximo ➡</a>
                <?php endif; ?>
            </div>
            <p>
                <?php echo count($projetos); ?> projeto(s) cadastrado(s)</p>
        <?php endif; ?>
    </div>
    <?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>