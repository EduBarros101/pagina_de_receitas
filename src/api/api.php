<?php

require_once '../config/conn.php';

$smtp = $pdo->prepare('SELECT * FROM receitas');
$smtp->execute();
$result = $smtp->fetchAll(PDO::FETCH_ASSOC);
