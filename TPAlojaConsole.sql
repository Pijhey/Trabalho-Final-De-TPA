drop database if exists LojaDeConsole;

create database LojaDeConsole;

use LojaDeConsole;

create table Customer(
idCustomer int primary key not null auto_increment,
Name varchar(100) not null,
Email varchar(199) not null,
Cellphone varchar(100) not null,
Password varchar(255) not null
);

create table Console(
idConsole int primary key not null auto_increment,
Model varchar(100) not null,
idBrand int not null,
Price float not null
);

create table Brand(
    idBrand int primary key not null auto_increment,
    Name varchar(199) not null
);

-- Tabela Custumer
INSERT INTO Customer (Name, Email, Cellphone, Password) VALUES ('João Silva', 'joao.silva@example.com', '11987654321', '$2y$10$KwhGHAKYHOeul4LHAg6aze/HcrTOB9siT76cWskrW40ulAtRQuJL6');
INSERT INTO Customer (Name, Email, Cellphone, Password) VALUES ('Maria Oliveira', 'maria.oliveira@example.com', '21987654321', '$2y$10$KwhGHAKYHOeul4LHAg6aze/HcrTOB9siT76cWskrW40ulAtRQuJL6');
INSERT INTO Customer (Name, Email, Cellphone, Password) VALUES ('Pedro Santos', 'pedro.santos@example.com', '31987654321', '$2y$10$KwhGHAKYHOeul4LHAg6aze/HcrTOB9siT76cWskrW40ulAtRQuJL6');
INSERT INTO Customer (Name, Email, Cellphone, Password) VALUES ('Ana Costa', 'ana.costa@example.com', '41987654321', '$2y$10$KwhGHAKYHOeul4LHAg6aze/HcrTOB9siT76cWskrW40ulAtRQuJL6');
INSERT INTO Customer (Name, Email, Cellphone, Password) VALUES ('Lucas Pereira', 'lucas.pereira@example.com', '51987654321', '$2y$10$KwhGHAKYHOeul4LHAg6aze/HcrTOB9siT76cWskrW40ulAtRQuJL6');


INSERT INTO Brand (idBrand, Name) VALUES (1, 'Sony');
INSERT INTO Brand (idBrand, Name) VALUES (2, 'Microsoft');
INSERT INTO Brand (idBrand, Name) VALUES (3, 'Nintendo');

-- Tabela Console
INSERT INTO Console (Model, idBrand, Price) VALUES ('PlayStation 5', 1, 499.99);
INSERT INTO Console (Model, idBrand, Price) VALUES ('Xbox Series X', 2, 499.99);
INSERT INTO Console (Model, idBrand, Price) VALUES ('Nintendo Switch', 3, 299.99);
INSERT INTO Console (Model, idBrand, Price) VALUES ('PlayStation 4 Pro', 1, 399.99);
INSERT INTO Console (Model, idBrand, Price) VALUES ('Xbox One X', 2, 299.99);

SELECT * FROM Customer;
SELECT * FROM Console;
SELECT * FROM Customer WHERE Name = 'João Silva';
SELECT COUNT(*) AS TotalClientes FROM Customer;
SELECT * FROM Console WHERE Price > 300.00;
SELECT AVG(Price) AS PrecoMedio FROM Console;
SELECT * FROM Customer WHERE Cellphone = '11987654321';

