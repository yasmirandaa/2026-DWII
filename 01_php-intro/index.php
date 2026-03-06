<?php
    $nome = "Yasmin Lara Amanajás de Miranda";
    $profissao = "Estudante de Tecnologia";
    $curso = "Técnico em Informática IFFR";
    $pagina_atual = "inicio";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Portfólio - <?php echo $nome; ?></title>  
</head>
<body>
    <?php include 'includes/cabecalho.php'; ?>
    

    <div class="inicio">
        <h1><?php echo $nome; ?></h1>
        <p><?php echo $profissao; ?> | <?php echo $curso; ?></p>
    </div>
    <div class="container">
        <h2>Bem-vindo ao meu portfólio</h2>
        <p>Esta página foi gerada pelo PHP em:
            <strong><?php echo date("d/m/y \à\s H:i:s"); ?></strong></p>
    </div>

    <?php include 'includes/rodape.php'; ?>

</body>
</html>