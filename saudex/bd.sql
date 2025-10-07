create DATABASE saudex;
use saudex;

CREATE TABLE usuarios(
    cod INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR (50) NOT NULL,
    Senha VARCHAR (255) NOT NULL,
    Email VARCHAR (50) NOT NULL,
    cpf CHAR (15) NOT NULL,
    Telefone CHAR (15),
    cep CHAR (9),
    nasc DATE NOT NULL,
    genero ENUM ('Masculino','Feminino','Outro'),
    role ENUM('admin', 'user') DEFAULT 'user',
    Foto VARCHAR(255) DEFAULT NULL
);

CREATE TABLE posts (
    codPost INT AUTO_INCREMENT PRIMARY KEY,
    codUsuario INT NOT NULL,
    legenda TEXT,
    urlMidia VARCHAR(255) NOT NULL,
    tipoMidia ENUM('imagem', 'video') DEFAULT 'imagem',
    criadoEm DATETIME DEFAULT CURRENT_TIMESTAMP,
    atualizadoEm DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (codUsuario) REFERENCES usuarios(cod)
);

CREATE TABLE notificacoes (
    codNotificacao INT AUTO_INCREMENT PRIMARY KEY,
    codUsuario INT NOT NULL,
    codPost INT NULL,
    tipo ENUM('comentario','mensagem','sistema','consulta','novo_post') NOT NULL,
    mensagem TEXT NOT NULL,
    lida BOOLEAN DEFAULT 0,
    criadoEm DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (codUsuario) REFERENCES usuarios(cod),
    FOREIGN KEY (codPost) REFERENCES posts(codPost)
);

INSERT INTO usuarios (Nome, Senha, Email, cpf, Telefone, cep, nasc, genero, role) 
VALUES ('ADMIN', '$2y$10$Dgh7ASzwiDq5Xbgbqpz/We5zjQ8VnnR0Wj28rDwYe7qPSDATp1wWS', 'ADMIN@GMAIL.COM', '321.456.789-01', '(99) 99999-9999', '07654-321', '1999-01-01', 'Outro', 'admin');
