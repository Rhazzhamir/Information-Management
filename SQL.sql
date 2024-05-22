DROP DATABASE IF EXISTS shopping_cart;
CREATE DATABASE shopping_cart;

USE shopping_cart;

CREATE TABLE Seller (
    Seller_Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    First_Name VARCHAR(200) NOT NULL,
    Last_Name VARCHAR(200) NOT NULL,
    Address VARCHAR(200) NOT NULL,
    ContactNumber varchar(16) NOT NULL
);

CREATE TABLE category(
	category_id INT PRIMARY KEY NOT NULL auto_increment,
    category_name VARCHAR(200) NOT NULL UNIQUE
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
    ContactNo VARCHAR(16) not null,
    Email VARCHAR(255) not null unique,
    Password VARCHAR(255) not null
);

CREATE TABLE Cart (
	Cart_Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Customer_Id INT NOT NULL UNIQUE,
    Created_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key (Customer_Id) references Customer(Customer_Id)
);

CREATE TABLE Cart_Product (
	Cart_Id INT NOT NULL,
    Product_Id INT NOT NULL,
    Quantity INT NOT NULL,
    foreign key (Cart_Id) references Cart(Cart_Id),
    foreign key (Product_Id) references Product(Product_Id),
    primary key (Cart_Id, Product_Id)
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


CREATE VIEW Product_With_CategoryName as
SELECT 
    Product_Id,
    Product.Category_Id,
    Category_Name,
    Product_Name,
    Product_Price,
    Product_Img,
    Product_Stock,
    Product_date
FROM
	Product,
	Category
WHERE
	Product.Category_Id = Category.Category_Id;

-- DELETE
DELIMITER //
CREATE PROCEDURE Force_Delete_Category (IN in_category_id INT)
BEGIN
	DELETE FROM Product WHERE Category_Id = in_category_id;
	DELETE FROM category WHERE category_id = in_category_id;
END //
DELIMITER ;


-- EDIT
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


DELIMITER //

CREATE PROCEDURE Customer_With_Cart (
	IN in_name VARCHAR(255),
    IN in_address VARCHAR(255),
    IN in_contact VARCHAR(255),
    IN in_email VARCHAR(255),
    IN in_password VARCHAR(255)
)
BEGIN
    INSERT INTO Customer (Name, Address, ContactNo, Email, Password)
    VALUES (in_name, in_address, in_contact, in_email, in_password);
    INSERT INTO Cart (Customer_Id) VALUES
    ((SELECT Customer_Id FROM Customer WHERE Email = in_email));
END //

DELIMITER ;


DELIMITER //
CREATE PROCEDURE Force_Delete_Product( IN in_id int)
BEGIN
	DELETE FROM Cart_Product WHERE Product_Id = in_id;
    DELETE FROM Product WHERE Product_Id = in_id;
END //
DELIMITER ;