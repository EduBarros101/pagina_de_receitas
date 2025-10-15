<?php

$pdo = require_once '../../src/config/conn.php';

$recipeArray = [];
$ingredientsArray = [];
$prepModeArray = [];
$commentsArray = [];

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id_receita = htmlspecialchars($_GET['id']);

  $recipe =
    'SELECT * FROM receitas r
    WHERE r.id_receita = :id;';

  $ingredients =
    'SELECT i.nm_ingrediente, i.qt_ingrediente, i.un_ingrediente
    FROM receitas r
    JOIN ingredientes i ON r.id_receita = i.id_receita
    WHERE r.id_receita = :id;';

  $prepMode =
    'SELECT mp.txt_orientacao, mp.nr_ordem
    FROM modo_preparo mp
    JOIN receitas r ON mp.id_receita = r.id_receita
    WHERE mp.id_receita = :id
    ORDER BY mp.nr_ordem;';

  $comments =
    'SELECT * from comentarios c
    WHERE c.id_receita = :id;';

  // it looks like I could take it all into a function. Gotta get back here latter to refactor. I'm more interested about having it all rendered properly right now.

  $stmt1 = $pdo->prepare($recipe);
  $stmt1->execute([
    ':id' => $id_receita
  ]);

  $stmt2 = $pdo->prepare($ingredients);
  $stmt2->execute([
    'id' => $id_receita
  ]);

  $stmt3 = $pdo->prepare($prepMode);
  $stmt3->execute([
    'id' => $id_receita
  ]);

  $stmt4 = $pdo->prepare($comments);
  $stmt4->execute([
    'id' => $id_receita
  ]);

  $recipeArray = $stmt1->fetchAll(PDO::FETCH_ASSOC);
  $ingredientsArray = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  $prepModeArray = $stmt3->fetchAll(PDO::FETCH_ASSOC);
  $commentsArray = $stmt4->fetchAll(PDO::FETCH_ASSOC);

  $pdo = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../../assets/styles/index.css" />
  <script
    src="https://kit.fontawesome.com/e9615b96e3.js"
    crossorigin="anonymous"></script>

  <title>Receita 1</title>
</head>

<body>
  <header>
    <div>
      <h1>Receitas</h1>
      <img src="../../assets/images/mosten-logo.png" alt="logo mosten" />
    </div>

    <nav>
      <ul>
        <li><a href="../../index.html">home</a></li>
        <li><a href="../../index.html">receitas</a></li>
        <li><a href="#contato">contato</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section>
      <div id="recipe-wrap">
        <div id="recipe-card">
          <h2><?= $recipeArray[0]['nm_receita'] ?></h2>

          <img

            src=<?= $recipeArray[0]['url_imagem'] ?>
            alt="imagem da receita" />

          <button id="like-button">

            <i class="fa-regular fa-thumbs-up"></i>
            <span id="like-counter">
              <?= $recipeArray[0]['qtd_curtidas'] ?>
            </span>
          </button>

          <div id="recipe-ingredients">
            <h3>Ingredientes:</h3>
            <ul>

              <?php foreach ($ingredientsArray as $ingredient): ?>
                <li>
                  <?= $ingredient['qt_ingrediente'] ?>
                  <?= $ingredient['un_ingrediente'] ?>
                  <?= $ingredient['nm_ingrediente'] ?>
                </li>
              <?php endforeach ?>

            </ul>
          </div>

          <div id="prep-guide">
            <h3>Modo de Preparo:</h3>

            <ul>
              <?php foreach ($prepModeArray as $howTo): ?>
                <li><?= $howTo['txt_orientacao'] ?></li>
              <?php endforeach ?>
            </ul>

          </div>

          <div id="prep-time">
            <h3>Tempo de preparo:</h3>

            <p><span id="prep-time-slot"><?= $recipeArray[0]['tmp_preparo'] ?></span> minutos.</p>
          </div>
        </div>

        <div id="comment-wrap">
          <form action="#" id="comment-form">
            <h3>Seu Comentário:</h3>

            <div id="comment-stars-container"></div>

            <textarea name="comment" id="comment"></textarea>

            <button id="form-buttom" type="submit">Enviar</button>
          </form>

          <div id="comments-section">
            <h3>Comantários:</h3>

            <div id="comments">
              <?php foreach ($commentsArray as $comment): ?>

                <div>
                  <h4>Fulano da Silva</h4>
                  <p><?= $comment['txt_comentario'] ?></p>
                </div>

              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="contato">
    <div id="footer-logo">
      <img src="../../assets/images/mosten-logo.png" alt="logo mosten" />
    </div>

    <div id="footer-social">
      <a
        href="https://www.instagram.com/mosten.co/"
        target="_blank"
        rel="noopener"><img
          src="../../assets/images/icons/instagram.png"
          alt="logo do instagram" /></a>

      <a
        href="https://www.linkedin.com/company/mosten/posts/?feedView=all"
        target="_blank"
        rel="noopener"><img
          src="../../assets/images/icons/linkedin.png"
          alt="logo do linkedin" /></a>
    </div>
  </footer>

  <script type="module" src="../js/app.js"></script>
</body>

</html>