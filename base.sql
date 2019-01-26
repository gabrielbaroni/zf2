
CREATE TABLE clientes (
	id int(11) NOT NULL AUTO_INCREMENT,
	nome varchar(100) NULL,
	data_nascimento date NULL,
	hora_nascimento TIME NULL,
	salario DECIMAL(10,2) NULL,
	sexo INT NULL,
	CONSTRAINT clientes_PK PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;

