CREATE TABLE usuario (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  nome VARCHAR(99) NOT NULL,
  descricao TEXT NOT NULL,
  senha VARCHAR(99) NOT NULL,
  email VARCHAR(99) NOT NULL
);
ALTER TABLE usuario ADD COLUMN codinome VARCHAR(99);
ALTER TABLE usuario ADD foto VARCHAR(255) NOT NULL DEFAULT '';
CREATE TABLE postagem (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  img VARCHAR(200) NOT NULL,
  descricao TEXT NOT NULL,
  id_usuario INT NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

CREATE TABLE comentario (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  id_post INT NOT NULL,
  id_usuario INT NOT NULL,
  comentario TEXT NOT NULL,
  FOREIGN KEY (id_post) REFERENCES postagem(id),
  FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

CREATE TABLE comissao (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  id_artista INT NOT NULL,
  id_cliente INT NOT NULL,
  descricao TEXT NOT NULL,
  valor VARCHAR(99) NOT NULL,
  FOREIGN KEY (id_artista) REFERENCES usuario(id)
  FOREIGN KEY (id_cliente) REFERENCES usuario(id)
);
CREATE TABLE seguidores (
    id_seguidor INT NOT NULL,
    id_seguido INT NOT NULL,
    data_seguimento DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_seguidor, id_seguido),
    FOREIGN KEY (id_seguidor) REFERENCES usuario(id),
    FOREIGN KEY (id_seguido) REFERENCES usuario(id)
);
CREATE TABLE curtidas (
    id_usuario INT NOT NULL,
    id_postagem INT NOT NULL,
    data_curtida DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_usuario, id_postagem),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_postagem) REFERENCES postagem(id)
);

-- Inserindo alguns usuários
INSERT INTO usuario (nome, descricao, senha, email) VALUES
('João Silva', 'Sou um entusiasta de tecnologia', '12345', 'joao.silva@gmail.com'),
('Maria Oliveira', 'Adoro viajar e conhecer novos lugares', 'abcde', 'maria.oliveira@hotmail.com'),
('Pedro Santos', 'Sou um estudante de engenharia', 'qwerty', 'pedro.santos@yahoo.com');

-- Inserindo algumas postagens
INSERT INTO postagem (img, descricao, id_usuario) VALUES
('https://example.com/imagem1.jpg', 'Essa é a minha primeira postagem', 1),
('https://example.com/imagem2.jpg', 'Vejam essa paisagem incrível', 2),
('https://example.com/imagem3.jpg', 'Construí essa ponte com minhas próprias mãos', 3);

-- Inserindo alguns comentários
INSERT INTO comentario (id_post, id_usuario, comentario) VALUES
(1, 2, 'Muito legal, parabéns!'),
(2, 3, 'Nunca tinha visto um lugar tão bonito'),
(3, 1, 'Incrível, você tem talento para a construção');

-- Inserindo algumas comissões
INSERT INTO comissao ( id_artista, descricao, valor) VALUES
( 2, 'Comissão pela venda da minha obra', 'R$500,00'),
( 1, 'Comissão pelo homem aranaha dando mortal desenho realista', 'R$250,00'),
( 2, 'Quero um batman quadrado', 'R$1.000,00');