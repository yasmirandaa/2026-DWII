<?php
    $nome = "Yasmin Lara Amanajás de Miranda";
    $pagina_atual = "sobre";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Sobre - <?php echo $nome; ?></title>
</head>
<body>
    <?php include 'includes/cabecalho.php'; ?>

    <div>
        <h1> Sobre mim</h1>
        <p>Olá! Sou <strong><?php echo $nome; ?></strong>, estudante de
        Técnico em Informática no IFPR de Ponta Grossa.</p>
        <p> Tenho 16 anos,
            estou cursando o 3º ano do Ensino Médio Técnico em Informática, 
            determinada a construir uma carreira 
            sólida na área de TI.</p>
        <a href="index.php"> Voltar ao início</a>
    </div>

    <?php include 'includes/rodape.php'; ?>
</body>
</html>