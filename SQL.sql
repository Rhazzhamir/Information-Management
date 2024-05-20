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
    Product_Img mediumblob NOT NULL,
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


DELIMITER //

CREATE PROCEDURE Edit_Product (
    IN in_Product_Id INT,
    IN in_Category_Id INT,
    IN in_Product_Name VARCHAR(255),
    IN in_Product_Price DECIMAL(10,2),
    IN in_Product_img mediumblob,
    IN in_Product_Stock INT
)
BEGIN
    UPDATE Product
    SET 
        Category_Id = CASE WHEN in_Category_Id IS NOT NULL THEN in_Category_Id ELSE Category_Id END,
        Product_Name = CASE WHEN in_Product_Name IS NOT NULL AND in_Product_Name != '' THEN in_Product_Name ELSE Product_Name END,
        Product_Price = CASE WHEN in_Product_Price IS NOT NULL THEN in_Product_Price ELSE Product_Price END,
        Product_Stock = CASE WHEN in_Product_Stock IS NOT NULL THEN in_Product_Stock ELSE Product_Stock END
    WHERE Product_Id = in_Product_Id;
    UPDATE Product SET Product_img = in_Product_img WHERE in_Product_img IS NOT NULL;
END //

DELIMITER ;