<?php
/**
 * ════════════════════════════════════════════════════════════
 * Disciplina : Desenvolvimento Web II (DWII)
 * Projeto    : Portfólio Pessoal — versão refatorada
 * Arquivo    : sobre.php
 * Autor      : Yasmin Lara Amanajás de Miranda
 * Data       : 19/04/2026
 * Descrição  : Página "Sobre" com informações acadêmicas
 *              organizadas em estrutura de dados (array).
 * ════════════════════════════════════════════════════════════
 */

$pagina_atual = 'sobre';
$caminho_raiz = './';
$titulo_pagina = 'Sobre — Yasmin Miranda';

$formacoes = [
    [
        'curso' => 'Ensino Médio Integrado ao Técnico em Informática',
        'instituicao' => 'IFPR - Campus Ponta Grossa',
        'ano' => '2024 - 2026'
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <?php
  /*
   * include injeta o conteúdo de cabecalho.php aqui dentro.
   * Ele gera: <meta>, <title>, <link rel="stylesheet"> e o <nav>.
   * __DIR__ garante o caminho correto independente de onde este
   * arquivo está sendo executado.
   */
  include __DIR__ . '/includes/cabecalho.php';
  ?>
</head>
<body>
<main>
    <section class="sobre">
        <h1>Sobre mim</h1>

        <p>
            Olá! Sou <strong>Yasmin Lara Amanajás de Miranda</strong>, estudante do
            Ensino Médio integrado ao curso Técnico em Informática no IFPR.
        </p>

        <p>
            Tenho interesse em desenvolvimento web e pretendo seguir carreira na área
            de tecnologia, especialmente em Engenharia de Software.
        </p>

        <h2>Formação acadêmica</h2>

        <?php foreach ($formacoes as $f): ?>
            <p>
                <?= $f['curso'] ?> — <?= $f['instituicao'] ?>
                (<?= $f['ano'] ?>)
            </p>
        <?php endforeach; ?>

        <div class="btn">
            <a href="index.php">Voltar ao início</a>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/rodape.php'; ?>
</body>
</html>