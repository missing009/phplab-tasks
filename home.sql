CREATE DATABASE online_shop;
use online_shop;
create table customers
(
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
    CategoryName varchar(150),
    ProductId int
);

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
WHERE p.categoryid = c.categoryid ;

ALTER table customers ADD  Id INT PRIMARY KEY AUTO_INCREMENT;
ALTER table product ADD   ProductId INT PRIMARY KEY AUTO_INCREMENT;
ALTER table Category ADD   categoryid INT PRIMARY KEY AUTO_INCREMENT;

INSERT customers(FisrstName, Lastname, Email,Phone)
VALUES ('Stas', 'Babuch', 'stasbs@1111.com', 123456789);

INSERT customers(FisrstName, Lastname, Email,Phone)
VALUES ('Anton', 'Petrenko', 'anton@1111.com', 12345623789);

INSERT product(ProductName, Price, prod_description)
VALUES ('Iphone11', '1000$', ' model 2020');
INSERT Category(CategoryName, ProductId, categoryid)
VALUES ('phone', '1', 1);
INSERT Category(categoryname,id)
VALUES ('smartphone', 1);
INSERT Category(categoryname,id)
VALUES ('smartwatch', 2);
INSERT category(categoryname,id)
VALUES ('tablet', 3);
INSERT INTO `category` (`categoryname`,id) VALUES ('tablet',3);
SELECT DISTINCT ProductName
FROM product;

SELECT DISTINCT CategoryName
FROM Category;

select *
FROM Category
WHERE categoryname = 'watch';


SELECT product.Price, product.prod_description,Category.CategoryName
FROM product, category
WHERE category.id = product.categoryid
  AND  product.ProductName = 'iwatch';



select *
FROM `category`
WHERE CategoryName = 'smartwatch';

SELECT Address
FROM customers
WHERE Address LIKE '%iv%';

SELECT * FROM product
ORDER BY Price;
select *from customers
order by birthday ;

SELECT ProductName, Price * Price AS TotalSum
FROM product
ORDER BY TotalSum;
select FirstName,Lastname,birthday
from customers
order by birthday desc
limit 5;



SELECT orders.Id, Customers.FirstName, Orders.CreatedAt,Orders.Price
FROM orders
         INNER JOIN customers
                    ON Orders.CustomerID=customers.Id;

SELECT orders.Id, Customers.FirstName, Orders.CreatedAt
FROM orders
         RIGHT OUTER  JOIN customers
                    ON Orders.CustomerID=customers.Id;

SELECT customers.Address  FROM customers
UNION ALL
SELECT City FROM Suppliers
ORDER BY Address;

SELECT COUNT(product.ProductId) AS NumberOfProducts FROM product;

SELECT MIN(birthday) AS minyear FROM customers;
SELECT MAX(birthday) AS Maxyear FROM customers;
SELECT SUM(Price) AS TotalItemsOrdered FROM product;
SELECT AVG(Price) AS AveragePrice FROM product;

SELECT categoryid, SUM(Price) as sum FROM product GROUP BY price;

SELECT categoryid, MAX(price) as max FROM product GROUP BY categoryid;
SELECT categoryid,MIN(price) as min FROM product GROUP BY categoryid;

SELECT COUNT(id), Address
FROM customers
GROUP BY Address
HAVING COUNT(id) > 0;


SELECT *
FROM customers
WHERE ID IN (SELECT ID
             FROM customers
             WHERE birthday > 2000) ;

UPDATE product
SET Price = Price * 25
WHERE categoryid =2 ;

DELETE FROM customers
WHERE birthday >2003;
select FirstName from customers;
