CREATE TABLE usuario (
  id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  nome VARCHAR(99) NOT NULL,
  descricao TEXT NOT NULL,
  senha VARCHAR(99) NOT NULL,
  email VARCHAR(99) NOT NULL,
  codinome VARCHAR(99) NOT NULL,
  foto VARCHAR(255) NOT NULL
);

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
  FOREIGN KEY (id_artista) REFERENCES usuario(id),
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

---inserts------
----------------
----------------
----------------
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Olha esse meme que engraçado!', 1);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Esse meme é simplesmente demais!', 2);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Não consigo parar de rir desse meme', 3);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Meme muito criativo!', 4);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Esse meme é a minha cara!', 5);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Só quem entende de memes vai entender esse', 6);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Meme do dia!', 7);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Meme perfeito para o momento', 8);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Esse meme é a melhor coisa que vi hoje!', 1);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Que meme incrível!', 1);
INSERT INTO postagem (img, descricao, id_usuario) VALUES ('https://linkdaimagem.com', 'Mais um meme para a coleção', 1);
-------------------
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Gabriel', 'Apaixonado por memes e games', '12345', 'gabriel@gmail.com', 'Gabs', 'https://linkdaimagem.com');
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Juliana', 'Viciada em memes de gatos', '12345', 'juliana@hotmail.com', 'JujuMemes', 'https://linkdaimagem.com');
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Pedro', 'Memeiro profissional', '12345', 'pedro@outlook.com', 'PedrinhoMemes', 'https://linkdaimagem.com');
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Larissa', 'Amante dos memes de comédia', '12345', 'larissa@gmail.com', 'LariMemes', 'https://linkdaimagem.com');
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Felipe', 'Criador de memes aleatórios', '12345', 'felipe@hotmail.com', 'FelipMemes', 'https://linkdaimagem.com');
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Mariana', 'Compartilhadora de memes engraçados', '12345', 'mariana@gmail.com', 'MariMemes', 'https://linkdaimagem.com');
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Lucas', 'Adorador de memes de anime', '12345', 'lucas@hotmail.com', 'LucasMemes', 'https://linkdaimagem.com');
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Amanda', 'Viciada em memes de celebridades', '12345', 'amanda@gmail.com', 'AmandMemes', 'https://linkdaimagem.com');
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Gustavo', 'Fã de memes de futebol', '12345', 'gustavo@hotmail.com', 'GustMemes', 'https://linkdaimagem.com');
INSERT INTO usuario (nome, descricao, senha, email, codinome, foto) VALUES ('Camila', 'Memeira por hobby', '12345', 'camila@gmail.com', 'CamiMemes', 'https://linkdaimagem.com');
--------------------------------------------------
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (1, 2);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (1, 3);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (2, 4);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (3, 4);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (4, 1);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (4, 5);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (5, 6);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (6, 7);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (7, 8);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (8, 9);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (9, 10);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (10, 1);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (1, 1);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (1, 4);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (1, 5);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (1, 6);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (1, 7);
INSERT INTO seguidores (id_seguidor, id_seguido) VALUES (1, 8);
----------------------------------------------------
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (1, 1);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (1, 2);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (2, 3);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (3, 4);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (4, 5);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (5, 6);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (6, 7);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (7, 8);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (8, 9);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (9, 10);
INSERT INTO curtidas (id_usuario, id_postagem) VALUES (10, 11);