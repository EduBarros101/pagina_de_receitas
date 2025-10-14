<?php

header('Content-Type: application/json');

require_once '../config/conn.php';

$data = json_decode(file_get_contents('php://input'), true);

// echo "<pre>";
// print_r($data);
// echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($data['recipeId']) && isset($data['comment']) && !empty($data['comment'])) {
        try {
            $recipeId = $data['recipeId'];
            $commentText = $data['comment'];
            $avaliacao = $data['avaliacao'];

            $stmt = $pdo->prepare(
                'INSERT INTO comentarios (id_receita, txt_comentario, avaliacao)
                VALUES (:id_receita, :txt_comentario, :avaliacao);'
            );

            $stmt->execute(
                [
                    ':id_receita' => $recipeId,
                    ':txt_comentario' => $commentText,
                    ':avaliacao' => $avaliacao
                ]
            );

            $lastId = $pdo->lastInsertId();

            $stmt = $pdo->prepare(
                'SELECT * FROM comentarios
                WHERE id_comentario = :id;'
            );

            $stmt->execute([
                ':id' => $lastId
            ]);

            $newComment = $stmt->fetch(PDO::FETCH_ASSOC);

            http_response_code(201);
            echo json_encode($newComment);
        } catch (PDOException $e) {
            http_response_code(500);

            echo json_encode(['error' => 'Erro ao salvar o comentário: ' . $e->getMessage()]);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Dados incompletos.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido.']);
}
