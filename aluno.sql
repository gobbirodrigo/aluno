/*

    Crie um arquivo .sql para colocar a criação de seu banco de dados e tabelas para facilitar futuramente a correção do seu projeto, então o arquivo ficará assim:

CREATE DATABASE ……

CREATE TABLE …..

INSERT INTO ....

    Você criará um banco de dados no MYSQL e uma tabela “alunos” com id (chave     

               primária), nome (varchar(255)), nota (int) e inserirá 20 registros variados na    

                       tabela “alunos”, coloque estes 20 inserts no nosso arquivo .sql. Crie um sistema    

                       para listar todos os alunos e também para listar os que têm as três maiores   

                       notas.
*/

CREATE DATABASE alunos;
CREATE TABLE alunos (id int auto_increment primary key,nome varchar(255), nota int);

INSERT INTO alunos (nome, nota) values('joao',10);
INSERT INTO alunos (nome, nota) values('maria',7);
INSERT INTO alunos (nome, nota) values('pedro',6);
INSERT INTO alunos (nome, nota) values('paulo',5);
INSERT INTO alunos (nome, nota) values('jose',9);
INSERT INTO alunos (nome, nota) values('lucas',3);
INSERT INTO alunos (nome, nota) values('rodrigo',10);
INSERT INTO alunos (nome, nota) values('mauro',8);
INSERT INTO alunos (nome, nota) values('alex',9);
INSERT INTO alunos (nome, nota) values('paula',4);
INSERT INTO alunos (nome, nota) values('mariane',3);
INSERT INTO alunos (nome, nota) values('lilian',6);
INSERT INTO alunos (nome, nota) values('jessica',8);
INSERT INTO alunos (nome, nota) values('tuane',7);
INSERT INTO alunos (nome, nota) values('guilherme',9);
INSERT INTO alunos (nome, nota) values('evandro',6);
INSERT INTO alunos (nome, nota) values('caio',6);
INSERT INTO alunos (nome, nota) values('michele',4);
INSERT INTO alunos (nome, nota) values('max',2);
INSERT INTO alunos (nome, nota) values('henrique',8);
INSERT INTO alunos (nome, nota) values('marcia',1);