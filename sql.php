<?php
 $sql = "SELECT CustomerName,City FROM Customers";// Retorna name e city
 $sql = "SELECT * FROM Customers";// Retorna todos os valores
 $sql = "SELECT DISTINCT City FROM Customers"; // Retorna valores diferentes
 $sql = "SELECT * FROM Customers WHERE Country='Mexico'";
 $sql = "SELECT * FROM Customers WHERE CustomerID=1";
 //Seleciona todos os clientes do país "Alemanha" E a cidade de Berlin 
 $sql = "SELECT * FROM Customers WHERE Country='Germany' AND City='Berlin'"; 
 //Seleciona todos os clientes da cidade de "Berlim" ou cidade de Munchen 
 $sql = "SELECT * FROM Customers WHERE City='Berlin' OR City='München';"; 
 //A instrução SQL a seguir seleciona todos os clientes do país "Alemanha" E a cidade deve ser igual a "Berlin " OR " München " , no quadro " Clientes
 $sql = "SELECT * FROM Customers WHERE Country='Germany' AND (City='Berlin' OR City='München')";
 //A instrução SQL a seguir seleciona todos os clientes da tabela " Clientes " , classificadas pela coluna "País" :
 $sql = "SELECT * FROM Customers ORDER BY Country;";
 //A instrução SQL a seguir seleciona todos os clientes da tabela " Clientes " , classificado decrescente pela coluna "País" (Do maior para o menor)
 $sql = "SELECT * FROM Customers ORDER BY Country DESC;";
 // A instrução SQL a seguir seleciona todos os clientes da tabela "Clientes" , ordenada pelo " País " e  " CustomerName " :
 $sql = "SELECT * FROM Customers ORDER BY Country, CustomerName;";
 //A instrução SQL a seguir seleciona todos os clientes da tabela "Clientes" , ordenadas por Pais em forma ascendente  e nome do cliente de forma decrescente:
 $sql = "SELECT * FROM Customers ORDER BY Country ASC, CustomerName DESC;";
 //Inserir dados na tabela
 $sql = "INSERT INTO Customers (CustomerName, ContactName, Address, City,PostalCode, Country) VALUES ('Cardinal','Tom B. Erichsen','Skagen 21','Stavanger','4006','Norway');";
 $sql = "INSERT INTO Customers (CustomerName, City, Country)VALUES ('Cardinal', 'Stavanger', 'Norway');";
 $sql = "INSERT INTO Customers VALUES ('Cardinal', 'Stavanger', 'Norway');";
?>