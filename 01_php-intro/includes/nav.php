<?php
  $cor_inicio   = ($pagina_atual === "inicio")   ? "color: #f7f2ec; font-weight: bold;" : "color: #b05a48;;";
  $cor_sobre    = ($pagina_atual === "sobre")    ? "color: #f7f2ec; font-weight: bold;" : "color: #b05a48;;";
  $cor_projetos = ($pagina_atual === "projetos") ? "color: #f7f2ec; font-weight: bold;" : "color: #b05a48;;";
?>
<!DOCTYPE html>
<html lang="PT-BR ">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>nav</title>
</head>
<body>
    <nav class="nav">
      <a href="index.php"    style="<?php echo $cor_inicio; ?>">Início</a>
      <a href="sobre.php"    style="<?php echo $cor_sobre; ?>">Sobre</a>
      <a href="projetos.php" style="<?php echo $cor_projetos; ?>">Projetos</a>
    </nav>
</body>
</html>
