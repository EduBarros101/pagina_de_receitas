<?php

header('Content-Type: application/json');

require_once '../config/conn.php';

$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($data['action']) && $data['action'] === 'add_comment_like') {

        if (isset($data['recipeId'], $data['comment'], $data['avaliacao']) && !empty(trim($data['comment'])) && $data['avaliacao'] > 0) {

            $pdo->beginTransaction();

            try {
                $recipeId = $data['recipeId'];
                $commentText = $data['comment'];
                $avaliacao = $data['avaliacao'];
                $isLiked = isset($data['isLiked']) && $data['isLiked'] === true;

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

                if ($isLiked) {
                    $stmtLike = $pdo->prepare(
                        'UPDATE receitas SET qtd_curtidas = qtd_curtidas + 1
                        WHERE id_receita = :id_receita;'
                    );
                    $stmtLike->execute(['id_receita' => $recipeId]);
                }

                $stmtComment = $pdo->prepare(
                    'SELECT * FROM comentarios
                    WHERE id_comentario = :id;'
                );
                $stmtComment->execute([
                    ':id' => $lastId
                ]);
                $commentData = $stmtComment->fetch(PDO::FETCH_ASSOC);

                $response = ['comment' => $commentData];

                if ($isLiked) {
                    $stmtLikes = $pdo->prepare(
                        'SELECT qtd_curtidas FROM receitas
                        WHERE id_receita = :id_receita;'
                    );
                    $stmtLikes->execute(['id_receita' => $recipeId]);
                    $response['likes'] = $stmtLikes->fetchColumn();
                }

                $pdo->commit();

                http_response_code(201);
                echo json_encode($response);
            } catch (PDOException $e) {
                $pdo->rollBack();
                http_response_code(500);

                echo json_encode(['error' => 'Revertendo transação. Erro no Banco de Dados: ' . $e->getMessage()]);
            }
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Dados incompletos.']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Ação inválida.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido.']);
}
