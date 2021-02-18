CREATE DATABASE online_shop;
use online_shop;
create table customers
(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    FisrstName varchar(150),
    Lastname varchar(150),
    Email varchar(100),
    Address varchar(50),
    Phone varchar(50)
);
create table product
(
    ProductName varchar(150),
    Price varchar(150),
    categoryid varchar(100),
    prod_description varchar(150)
);

create table Category
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(150)
);
ALTER TABLE `product` ADD FOREIGN KEY (`categoryid`) REFERENCES `category`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE Orders
(
    Id INT AUTO_INCREMENT PRIMARY KEY,
    ProductId INT NOT NULL,
    CustomerId INT NOT NULL,
    CreatedAt DATE NOT NULL,
    ProductCount INT DEFAULT 1,
    Price DECIMAL NOT NULL,
    FOREIGN KEY (ProductId) REFERENCES product(ProductId) ON DELETE CASCADE,
    FOREIGN KEY (CustomerId) REFERENCES customers(Id) ON DELETE CASCADE
);

SELECT p.*, c.* FROM product p, Category c
WHERE p.categoryid = c.id ;


INSERT customers(FisrstName, Lastname, Email,Phone)
VALUES ('Stas', 'Babuch', 'stasbs@1111.com', 123456789);

INSERT customers(FisrstName, Lastname, Email,Phone)
VALUES ('Anton', 'Petrenko', 'anton@1111.com', 12345623789);

INSERT product(ProductName, Price, prod_description)VALUES ('Iphone11', '1000$', ' model 2020');

INSERT Category(CategoryName, ProductId, categoryid)VALUES ('phone', '1', 1);
INSERT Category(name,id)VALUES ('smartphone', 1);
INSERT Category(name,id)VALUES ('smartwatch', 2);
INSERT category(name,id)VALUES ('tablet', 3);

INSERT INTO `category` (`id`, `name`) VALUES ('4', 'TV'), ('5', 'Tv-box');
INSERT INTO `category` (`id`, `name`) VALUES ('6', 'PS game'), ('7', 'XBox game');

