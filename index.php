<?php

require_once './src/config/conn.php';

$result = $pdo;
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
          <div id="recipe-card">
            <img
              src="https://media.istockphoto.com/id/1493482723/pt/foto/rice-beans-grilled-chicken-steak-salad.jpg?s=612x612&w=0&k=20&c=vRfHmxp7BIOoMf529VtyXGW-Dd7tIWDk4fkFJOI-EoU="
              alt="imagem da receita" />

            <p>Receita 1</p>
            <button><a href="./src/views/recipe.html">Detalhes</a></button>
          </div>

          <div id="recipe-card">
            <img
              src="https://t3.ftcdn.net/jpg/04/57/73/82/360_F_457738290_y8fywtzTyfT2pQzU5mL1OpKHHAERc6kS.jpg"
              alt="imagem da receita" />

            <p>Receita 2</p>
            <button><a href="./src/views/recipe.html">Detalhes</a></button>
          </div>

          <div id="recipe-card">
            <img
              src="https://img.taste.com.au/usDoXvoa/taste/2018/01/healthy-chicken-chow-mein-134805-1.jpg"
              alt="imagem da receita" />

            <p>Receita 3</p>
            <button><a href="./src/views/recipe.html">Detalhes</a></button>
          </div>
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