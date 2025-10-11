<?php

$pdo = require_once './src/config/conn.php';

$stmt = $pdo->prepare('SELECT * FROM receitas');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($result);
// echo "</pre>";

$pdo = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="assets/styles/index.css" />

  <title>Página de Receitas</title>
</head>

<body>
  <header>
    <div>
      <h1>Receitas</h1>
      <img src="assets/images/mosten-logo.png" alt="logo mosten" />
    </div>

    <nav>
      <ul>
        <li><a href="./index.html">home</a></li>
        <li><a href="#receitas">receitas</a></li>
        <li><a href="#contato">contato</a></li>
      </ul>
    </nav>
  </header>

  <main id="receitas">
    <section>
      <div id="recipes-list">
        <h2>Receitas</h2>
        <p>Lista de Receitas</p>

        <div id="cards-container">

          <?php foreach ($result as $receita): ?>

            <div id="recipe-card" data-idReceita="<?= $receita['id_receita'] ?>">
              <img src="<?= $receita['url_imagem'] ?>"
                alt="imagem da receita" />

              <h4><?= $receita['nm_receita'] ?></h4>
              <button><a href="./src/views/recipe.php?id=<?= $receita['id_receita'] ?>">Detalhes</a></button>
            </div>

          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </main>

  <footer id="contato">
    <div id="footer-logo">
      <img src="assets/images/mosten-logo.png" alt="logo mosten" />
    </div>

    <div id="footer-social">
      <a
        href="https://www.instagram.com/mosten.co/"
        target="_blank"
        rel="noopener"><img src="assets/images/icons/instagram.png" alt="logo do instagram" /></a>

      <a
        href="https://www.linkedin.com/company/mosten/posts/?feedView=all"
        target="_blank"
        rel="noopener"><img src="assets/images/icons/linkedin.png" alt="logo do linkedin" /></a>
    </div>
  </footer>
  <script type="module" src="./src/js/app.js"></script>
</body>

</html>