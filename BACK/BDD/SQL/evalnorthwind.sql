-- Exercice 1 - Liste des clients Français --

SELECT CompanyName AS Société, ContactName AS contact, ContactTitle AS Fonction, Phone AS Téléphone
FROM customers WHERE Country = 'France';



-- Exercice 2 - Liste des produits vendus par le fournisseur "Exotic Liquids" --

SELECT ProductName AS Produit, UnitPrice AS Prix
FROM products
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE CompanyName = 'Exotic Liquids';



-- Exercice 3 - Nombre de produits mis à disposition par les fournisseurs français (tri par nombre de produits décroissant) --

SELECT CompanyName AS Fournisseur, COUNT(ProductName) AS Nbre_produits
FROM products
JOIN suppliers ON suppliers.SupplierID = products.SupplierID
WHERE Country = 'France'
GROUP BY CompanyName
ORDER BY COUNT(ProductName)DESC;



-- Exercice 4 - Liste des clients français ayant passé plus de 10 commandes --

SELECT CompanyName AS Clients, COUNT(OrderID) AS Nbre_commandes
FROM customers
JOIN orders ON orders.CustomerID = customers.CustomerID
WHERE Country = 'France'
GROUP BY CompanyName
HAVING COUNT(OrderID) > 10;



-- Exercice 5 - Liste des clients dont le montant cumulé de toutes les commandes passées est supérieur à 30000 € --

SELECT CompanyName AS 'Client', SUM(UnitPrice * Quantity) AS 'CA', Country AS 'Pays'
FROM customers
JOIN orders ON orders.CustomerID = customers.CustomerID
JOIN `order details` ON `order details`.OrderID = orders.OrderID
GROUP BY CompanyName
HAVING SUM(`order details`.UnitPrice * `order details`.Quantity) > 30000
ORDER BY SUM(`order details`.UnitPrice * `order details`.Quantity) DESC;


-- Exercice 6 - Liste des pays dans lesquels des produits fournis par "Exotic Liquids" ont été livrés --

SELECT ShipCountry AS 'Pays'
FROM orders
JOIN `order details` ON `order details`.OrderID = orders.OrderID
JOIN products ON products.ProductID = `order details`.ProductID
JOIN suppliers ON suppliers.SupplierID = products.SupplierID
WHERE CompanyName = 'Exotic Liquids'
GROUP BY orders.ShipCountry;



-- Exercice 7 - Chiffre d'affaires global sur les ventes de 1997 --

SELECT SUM(`order details`.UnitPrice * `order details`.Quantity) AS 'Montant ventes 1997'
FROM `order details`
JOIN orders ON orders.OrderID = `order details`.OrderID
WHERE YEAR(OrderDate) = '1997';



-- Exercice 8 - Chiffre d'affaires détaillé par mois, sur les ventes de 1997 --

SELECT MONTH(OrderDate) AS 'Mois 97', SUM(`order details`.UnitPrice * `order details`.Quantity) AS 'Montant ventes'
FROM orders
JOIN `order details` ON `order details`.OrderID = orders.OrderID
WHERE YEAR(OrderDate) = '1997'
GROUP BY MONTH(OrderDate);



-- Exercice 9 - A quand remonte la dernière commande du client nommé "Du monde entier" ? --

SELECT MAX(OrderDate) AS 'Date de dernière commande'
FROM orders
JOIN customers ON customers.CustomerID = orders.CustomerID
WHERE CompanyName = 'Du monde entier';


-- Exercice 10 - Quel est le délai moyen de livraison en jours ? --

SELECT ROUND(avg(DATEDIFF(ShippedDate, OrderDate))) AS 'Délai moyen de livraison en jours'
FROM orders;