CREATE DATABASE prova_php;
use prova_php;
CREATE TABLE usuarios(
	`id` int not null primary key auto_increment,
    `nome` varchar(255) not null,
    `email` varchar(255) not null,
    `pasword` varchar(255) not null,
    `nivel_acesso` int not null
);

insert into usuarios(`nome`, `email`, `pasword`, `nivel_acesso`) values ('katrine', 'katrine@gmail.com', '123', 1);
 
select * from usuarios;