CREATE SCHEMA restaurant;
USE restaurant;

CREATE TABLE customer(
fname CHAR(15) NOT NULL,
lname CHAR(15) NOT NULL,
email VARCHAR(20) UNIQUE,
cphoneno INT(10) PRIMARY KEY UNIQUE,
cpassword VARCHAR (15) 
);

CREATE TABLE employee(
fname CHAR(15) NOT NULL,
lname CHAR(15) NOT NULL,
empssn VARCHAR(10) PRIMARY KEY UNIQUE,
address VARCHAR(15),
bdate VARCHAR(10),
salary decimal(10,0) NOT NULL,
sex CHAR(1) NOT NULL
);

CREATE TABLE corder(
orderno INT(10) AUTO_INCREMENT PRIMARY KEY UNIQUE,
caddress VARCHAR(15),
orderdate VARCHAR(10),
mealdetails VARCHAR(1000)
);