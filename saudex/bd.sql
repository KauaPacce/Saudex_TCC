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
    genero ENUM ('Masculino','Feminino','Outro')
);

CREATE TABLE adm (
    codAdm INT PRIMARY KEY,
    criadoEm TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (codAdm) REFERENCES usuarios(cod)
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