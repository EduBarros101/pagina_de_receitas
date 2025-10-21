-- CRIANDO E MOCANDO MEU BANCO DE DADOS

-- BANCO DE DADOS
CREATE DATABASE IF NOT EXISTS pagina_de_receitas;

USE pagina_de_receitas;

-- CRIACAO DAS TABELAS

CREATE TABLE IF NOT EXISTS receitas (
    id_receita int UNSIGNED NOT NULL AUTO_INCREMENT,
    nm_receita varchar(100) NOT NULL,
    url_imagem varchar(500) NOT NULL,
    tmp_preparo int NOT NULL,
    descricao text NOT NULL,
    qtd_curtidas int,
    CONSTRAINT pk_receitas PRIMARY KEY (id_receita)
);

CREATE TABLE IF NOT EXISTS comentarios (
    id_comentario int UNSIGNED NOT NULL AUTO_INCREMENT,
    id_receita int UNSIGNED NOT NULL,
    txt_comentario text NOT NULL,
    avaliacao int NOT NULL,
    CONSTRAINT pk_comentarios PRIMARY KEY (id_comentario),
    CONSTRAINT fk_comentarios_receitas FOREIGN KEY (id_receita) REFERENCES receitas (id_receita)
);

CREATE TABLE IF NOT EXISTS modo_preparo (
    id_modo_preparo int UNSIGNED NOT NULL AUTO_INCREMENT,
    id_receita int UNSIGNED NOT NULL,
    txt_orientacao varchar(255) NOT NULL,
    nr_ordem int NOT NULL,
    CONSTRAINT pk_modo_preparo PRIMARY KEY (id_modo_preparo),
    CONSTRAINT fk_modo_preparo_receitas FOREIGN KEY (id_receita) REFERENCES receitas (id_receita)
);

CREATE TABLE IF NOT EXISTS ingredientes (
    id_ingrediente int UNSIGNED NOT NULL AUTO_INCREMENT,
    id_receita int UNSIGNED NOT NULL,
    nm_ingrediente varchar(255) NOT NULL,
    qt_ingrediente int,
    un_ingrediente varchar(50),
    CONSTRAINT pk_ingredientes PRIMARY KEY (id_ingrediente),
    CONSTRAINT fk_ingredientes_receitas FOREIGN KEY (id_receita) REFERENCES receitas (id_receita)
);

-- INGREDIENTES

-- Ingredientes para a Receita 1 (Moqueca de Banana da Terra)
INSERT INTO
    ingredientes (
        id_receita,
        nm_ingrediente,
        qt_ingrediente,
        un_ingrediente
    )
VALUES (
        1,
        'Banana-da-terra madura',
        4,
        'unidades'
    ),
    (
        1,
        'Azeite de dendê',
        3,
        'colheres de sopa'
    ),
    (1, 'Leite de coco', 400, 'ml'),
    (
        1,
        'Cebola picada',
        1,
        'unidade'
    ),
    (
        1,
        'Pimentão vermelho em tiras',
        1,
        'unidade'
    ),
    (
        1,
        'Tomate picado',
        2,
        'unidades'
    ),
    (
        1,
        'Coentro picado',
        1,
        'a gosto'
    );

-- Ingredientes para a Receita 2 (Escondidinho de Mandioca com Carne Seca)
INSERT INTO
    ingredientes (
        id_receita,
        nm_ingrediente,
        qt_ingrediente,
        un_ingrediente
    )
VALUES (
        2,
        'Mandioca cozida e amassada',
        1,
        'kg'
    ),
    (
        2,
        'Carne seca desfiada',
        500,
        'g'
    ),
    (
        2,
        'Manteiga',
        2,
        'colheres de sopa'
    ),
    (
        2,
        'Cebola roxa picada',
        1,
        'unidade'
    ),
    (
        2,
        'Queijo coalho ralado',
        200,
        'g'
    ),
    (2, 'Leite', 100, 'ml'),
    (
        2,
        'Salsinha picada',
        1,
        'a gosto'
    );

-- Ingredientes para a Receita 3 (Panquecas Americanas com Calda de Maple)
INSERT INTO
    ingredientes (
        id_receita,
        nm_ingrediente,
        qt_ingrediente,
        un_ingrediente
    )
VALUES (
        3,
        'Farinha de trigo',
        1.5,
        'xícaras'
    ),
    (
        3,
        'Açúcar',
        2,
        'colheres de sopa'
    ),
    (
        3,
        'Fermento em pó',
        2,
        'colheres de chá'
    ),
    (3, 'Ovo', 1, 'unidade'),
    (3, 'Leite', 1.25, 'xícaras'),
    (
        3,
        'Manteiga derretida',
        3,
        'colheres de sopa'
    ),
    (
        3,
        'Xarope de bordo (Maple Syrup)',
        1,
        'a gosto'
    );

-- Ingredientes para a Receita 4 (Ceviche Clássico Peruano)
INSERT INTO
    ingredientes (
        id_receita,
        nm_ingrediente,
        qt_ingrediente,
        un_ingrediente
    )
VALUES (
        4,
        'Filé de peixe branco fresco',
        500,
        'g'
    ),
    (
        4,
        'Suco de limão',
        1,
        'xícara'
    ),
    (
        4,
        'Cebola roxa em fatias finas',
        1,
        'unidade'
    ),
    (
        4,
        'Pimenta dedo-de-moça picada',
        1,
        'unidade'
    ),
    (
        4,
        'Coentro fresco picado',
        0.5,
        'xícara'
    ),
    (
        4,
        'Sal e pimenta do reino',
        1,
        'a gosto'
    ),
    (
        4,
        'Milho cozido',
        1,
        'a gosto'
    );

-- Ingredientes para a Receita 5 (Bolo de Fubá Cremoso com Goiabada)
INSERT INTO
    ingredientes (
        id_receita,
        nm_ingrediente,
        qt_ingrediente,
        un_ingrediente
    )
VALUES (5, 'Fubá', 1.5, 'xícaras'),
    (5, 'Leite', 3, 'xícaras'),
    (5, 'Açúcar', 2, 'xícaras'),
    (5, 'Ovos', 3, 'unidades'),
    (
        5,
        'Farinha de trigo',
        3,
        'colheres de sopa'
    ),
    (
        5,
        'Queijo parmesão ralado',
        50,
        'g'
    ),
    (
        5,
        'Goiabada em cubos',
        200,
        'g'
    );

-- MODO DE PREPARO

-- Modo de Preparo para a Receita 1 (Moqueca de Banana da Terra)
INSERT INTO
    modo_preparo (
        id_receita,
        txt_orientacao,
        nr_ordem
    )
VALUES (
        1,
        'Em uma panela de barro, refogue a cebola no azeite de dendê.',
        1
    ),
    (
        1,
        'Adicione os pimentões e os tomates e refogue por mais alguns minutos.',
        2
    ),
    (
        1,
        'Acrescente as bananas cortadas em rodelas, o leite de coco e cozinhe por 10 minutos.',
        3
    ),
    (
        1,
        'Finalize com coentro picado e sirva quente.',
        4
    );

-- Modo de Preparo para a Receita 2 (Escondidinho de Mandioca com Carne Seca)
INSERT INTO
    modo_preparo (
        id_receita,
        txt_orientacao,
        nr_ordem
    )
VALUES (
        2,
        'Em uma panela, refogue a cebola na manteiga e adicione a carne seca.',
        1
    ),
    (
        2,
        'Prepare o purê: misture a mandioca amassada com o leite e a manteiga.',
        2
    ),
    (
        2,
        'Em um refratário, coloque a carne seca no fundo e cubra com o purê de mandioca.',
        3
    ),
    (
        2,
        'Polvilhe o queijo coalho por cima e leve ao forno para gratinar.',
        4
    );

-- Modo de Preparo para a Receita 3 (Panquecas Americanas com Calda de Maple)
INSERT INTO
    modo_preparo (
        id_receita,
        txt_orientacao,
        nr_ordem
    )
VALUES (
        3,
        'Em uma tigela, misture os ingredientes secos (farinha, açúcar, fermento).',
        1
    ),
    (
        3,
        'Em outra tigela, bata o ovo e misture com o leite e a manteiga derretida.',
        2
    ),
    (
        3,
        'Junte os ingredientes líquidos aos secos e mexa apenas até incorporar.',
        3
    ),
    (
        3,
        'Aqueça uma frigideira e despeje pequenas porções de massa. Vire quando começar a borbulhar.',
        4
    ),
    (
        3,
        'Sirva as panquecas com xarope de bordo (maple syrup).',
        5
    );

-- Modo de Preparo para a Receita 4 (Ceviche Clássico Peruano)
INSERT INTO
    modo_preparo (
        id_receita,
        txt_orientacao,
        nr_ordem
    )
VALUES (
        4,
        'Corte o peixe em cubos de aproximadamente 2 cm.',
        1
    ),
    (
        4,
        'Em uma tigela de vidro, misture o peixe com o suco de limão e deixe marinar na geladeira por 15 minutos.',
        2
    ),
    (
        4,
        'Escorra o excesso de suco de limão e adicione a cebola roxa, a pimenta e o coentro.',
        3
    ),
    (
        4,
        'Tempere com sal, pimenta e sirva imediatamente com milho cozido.',
        4
    );

-- Modo de Preparo para a Receita 5 (Bolo de Fubá Cremoso com Goiabada)
INSERT INTO
    modo_preparo (
        id_receita,
        txt_orientacao,
        nr_ordem
    )
VALUES (
        5,
        'Bata todos os ingredientes no liquidificador, exceto a goiabada.',
        1
    ),
    (
        5,
        'Despeje a massa em uma forma untada e enfarinhada.',
        2
    ),
    (
        5,
        'Passe os cubos de goiabada na farinha de trigo e distribua sobre a massa.',
        3
    ),
    (
        5,
        'Asse em forno pré-aquecido a 180°C por cerca de 45 minutos.',
        4
    );

-- COMENTARIOS

INSERT INTO
    comentarios (
        id_receita,
        txt_comentario,
        avaliacao
    )
VALUES (
        1,
        'Uma delícia! Opção vegetariana perfeita para a moqueca.',
        5
    ),
    (
        1,
        'Ficou um pouco forte no dendê, mas gostei.',
        4
    ),
    (
        2,
        'Comida afetiva total! A família toda amou.',
        5
    ),
    (
        3,
        'As panquecas ficaram muito fofinhas, receita nota 10!',
        5
    ),
    (
        3,
        'Fácil de fazer, mas a minha grudou um pouco na frigideira.',
        3
    ),
    (
        4,
        'Refrescante e delicioso! O peixe estava no ponto certo.',
        5
    ),
    (
        5,
        'Bolo cremoso perfeito! A combinação com goiabada é imbatível.',
        5
    ),
    (
        5,
        'O meu não ficou tão cremoso, mas o sabor é ótimo.',
        4
    );