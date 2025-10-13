<?php

require_once '../config/conn.php';

$stmt = $pdo->prepare('SELECT * FROM receitas');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
