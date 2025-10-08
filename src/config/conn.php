<?php

$host = 'localhost';
$dbname = 'pagina_de_receitas';
$charset = 'utf8mb4';
$user = 'root';
$pass = '#Barros101';

$dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

try {
    $pdo = new PDO($dsn, $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // $result = $pdo->query('select * from receitas')->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";

    // echo "conexão bem sucedida.";
    // echo "<br>";
    // echo "<br>";

    // foreach ($result as $receita) {

    //     echo "id: {$receita['id_receita']}.";
    //     echo "<br>";
    //     echo "nome: " . $receita['nm_receita'];
    //     echo "<br>";
    //     echo "id: " . $receita['descricao'];
    //     echo "<br>";
    //     echo "<br>";
    // }
} catch (PDOException $e) {

    die("Erro de conexão com o Banco de Dados: {$e->getMessage()}");
}
