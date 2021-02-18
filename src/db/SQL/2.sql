use online_shop;

SELECT DISTINCT name
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

SELECT id, SUM(Price) as sum FROM product GROUP BY price;

SELECT id, MAX(price) as max FROM product GROUP BY categoryid;
SELECT id,MIN(price) as min FROM product GROUP BY categoryid;

SELECT COUNT(id), Address
FROM customers
GROUP BY Address
HAVING COUNT(id) > 0;

SELECT *
FROM customers
WHERE ID IN (SELECT ID FROM customers WHERE birthday > 2000) ;

UPDATE product
SET Price = Price * 25
WHERE categoryid =2 ;

DELETE FROM customers
WHERE birthday >2003;
select FirstName from customers;
