DROP DATABASE IF EXISTS shopping_cart;
CREATE DATABASE shopping_cart;

USE shopping_cart;


CREATE TABLE category(
	category_id INT PRIMARY KEY NOT NULL auto_increment,
    category_name VARCHAR(200) NOT NULL UNIQUE
);

CREATE TABLE Seller (
    Seller_Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    First_Name VARCHAR(200) NOT NULL,
    Last_Name VARCHAR(200) NOT NULL,
    Address VARCHAR(200) NOT NULL,
    ContactNumber varchar(16) NOT NULL
);

CREATE TABLE Product (
    Product_Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Category_Id INT NOT NULL,
    Product_Name VARCHAR(20) NOT NULL,
    Product_Price DECIMAL(10, 2) NOT NULL,
    Product_Img mediumblob,
    Product_Stock INT NOT NULL,
    Product_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key (Category_Id) references Category(Category_Id)
);

CREATE TABLE Customer (
	Customer_Id int not null primary key auto_increment,
    Name VARCHAR(255) not null,
    Address VARCHAR(255) not null,
    ContactNo int not null,
    Email VARCHAR(255) not null,
    Password VARCHAR(255) not null
);

CREATE TABLE Transaction (
	Transaction_ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Transaction_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Order_Product (
	Order_Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Customer_Id INT NOT NULL, 
    Product_Id INT NOT NULL,
    Transaction_Id INT NOT NULL,
    Quantity INT NOT NULL,
    foreign key (Customer_Id) references Customer(Customer_Id),
    foreign key (Product_Id) references Product(Product_Id),
    foreign key (Transaction_Id) references Transaction(Transaction_Id)
);

