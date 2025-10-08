<?php

require_once __DIR__ . '../../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$charset = $_ENV['DB_CHARSET'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

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
