DROP DATABASE IF EXISTS shopping_cart;
CREATE DATABASE shopping_cart;

USE shopping_cart;


CREATE TABLE Manage_Category(
	Category_Id INT PRIMARY KEY NOT NULL auto_increment,
    category_Name VARCHAR(200) NOT NULL,
    Posting_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Seller (
    Seller_Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    First_Name VARCHAR(200) NOT NULL,
    Last_Name VARCHAR(200) NOT NULL,
    Address VARCHAR(200) NOT NULL,
    ContactNumber varchar(16) NOT NULL
);

CREATE TABLE Manage_Product (
    Product_Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Category_Id INT NOT NULL,
    Seller_Id INT NOT NULL,
    Product_Name VARCHAR(20) NOT NULL,
    Product_Price INT NOT NULL,
    Product_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    Product_Img mediumblob,
    foreign key (Category_Id) references Manage_Category(Category_Id),
    foreign key (Seller_Id) references Seller(Seller_Id)
);

CREATE TABLE Customer (
	Customer_Id int not null primary key auto_increment,
    Name VARCHAR(255) not null,
    Address VARCHAR(255) not null,
    ContactNo int not null
);

CREATE TABLE Order_Product (
	Order_Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Customer_Id INT NOT NULL, 
    Product_Id INT NOT NULL,
    Quantity INT NOT NULL,
    Price INT NOT NULL,
    Order_DATE TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key (Customer_Id) references Customer(Customer_Id),
    foreign key (Product_Id) references Manage_Product(Product_Id)
);

CREATE TABLE Sales (
	Sales_Id INT PRIMARY KEY NOT NULL auto_increment,
    Order_Id INT NOT NULL,
	Seller_Name VARCHAR(200) NOT NULL,
    Category VARCHAR(200) NOT NULL,
    Pricing INT NOT NULL,
    foreign key (Order_Id) references Order_Product(Order_Id)
);

