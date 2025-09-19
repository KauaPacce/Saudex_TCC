create DATABASE saudex;
use saudex;

CREATE TABLE usuarios(
    cod INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR (50) NOT NULL,
    Senha VARCHAR (255) NOT NULL,
    Email VARCHAR (50) NOT NULL,
    cpf VARCHAR (15) NOT NULL,
    Telefone VARCHAR (15),
    cep VARCHAR (9),
    nasc DATE NOT NULL,
    genero ENUM ('Masculino','Feminino','Outro'),
    role ENUM('admin', 'user') DEFAULT 'user'
);

INSERT INTO usuarios (Nome, Senha, Email, cpf, Telefone, cep, nasc, genero, role) 
VALUES ('ADMIN', '$2y$10$Dgh7ASzwiDq5Xbgbqpz/We5zjQ8VnnR0Wj28rDwYe7qPSDATp1wWS', 'ADMIN@GMAIL.COM', '321.456.789-01', '(99) 99999-9999', '07654-321', '1999-01-01', 'Outro', 'admin');

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