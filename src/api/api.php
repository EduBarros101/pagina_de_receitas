<?php

require_once '../config/conn.php';

$smtp = $pdo->prepare('select * from receitas');
$smtp->execute();
$result = $smtp->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($result);
echo "</pre>";
