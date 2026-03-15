<?php
$pagina_atual = "sumario";
$nome = "Yasmin Lara Amanajás de Miranda";
$subtitulo = "Repositório 2026 - DWII";

$aulas=[
    [
        "nome" => "Apresentação Pessoal",
        "descricao" => "Página estática com HTML e CSS - foto de perfil e layout responsivo.",
        "link" => "00_apresentacao/index.html",
        "conceitos" => "HTML semântico, CSS Flexbox, responsividade",
    ],
    [
        "nome" => "Portfólio Dinâmico com PHP",
        "descricao" => "Mini-site de portfólio com variáveis, includes e menu dinâmico.",
        "link" => "01_php-intro/index.php",
        "conceitos" => "Variáveis, echo, include, foreach, operador ternário",
    ],
    [   
        "nome" => "Formulário de Contato",
        "descricao" => "Formulário com validação no servidor, proteção XSS e padrão PRG.",
        "link" => "02_formularios/contato.php",
        "conceitos" => '$_POST, validação, htmlspecialchars(), header() + exit',
    ],
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($subtitulo); ?></title>
    <link rel="stylesheet" href="includes/estilo.css">
</head>
<body>
    <?php include 'includes/cabecalho.php'; ?>
    <div class="inicio">
        <h1><?php echo htmlspecialchars($nome); ?></h1>
        <p><?php echo htmlspecialchars($subtitulo); ?></p>
    </div>
   
    <div class="container">
        <h2> Projetos por Aula</h2>
        <?php foreach ($aulas as $aula): ?>

        <div class="secao">
            <h3 style="color: <?php echo $aula ['cor']; ?>; ">
                <a href="<?php echo htmlspecialchars($aula['link']); ?>">
                <?php echo htmlspecialchars($aula['nome']); ?>
                </a>
            </h3>

            <p><?php echo htmlspecialchars($aula['descricao']); ?></p>

            <span class="conceitos">
                <?php echo htmlspecialchars($aula['conceitos']); ?>
            </span><br>
            
        </div>
        <?php endforeach; ?>
        <p style="text-align: right; font-size: 13px; color: #9ca3af; margin-top: 8px;">
            Gerado em: <?php echo date("d/m/Y \à\s H:i:s"); ?>
        </p>
    </div>
    <div class="container">
        <div class="box-info">
            <h3> Como executar este repositório</h3>
            <p> Suba o servidor PHP na <strong>raiz</strong> para acessar todas as aulas </p>
            <div class="sla">
                cd ~/workspaces/2026-DWII<br>php -S localhost:8000
            </div>
            <p style="font-size: 13px; color: #6b7280; margin-top: 8px;">
                Esta página é o hub de navegação. Use os botões para acessar cada projeto.
            </p>
        </div>
    </div>
    <?php include 'includes/rodape.php'; ?>

</body>
</html>