<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data to PostgreSQL with PHP - creating a simple web application</title>

    <style>
        li{listt-style:none;}
    </style>
</head>
<body>
    <h2>Enter information regarding book</h2>
    <ul>
        <form name="insert" action="insert.php" method="POST">
            <li>Book ID: </li><li><input type="text" name="bookid" /></li>
            <li>Book Name: </li><li><input type="text" name="book_name" /></li>
            <li>Author: </li><li><input type="text" name="author" /></li>
            <li>Date Of Publication: </li><li><input type="text" name="dop" /></li>
            <li>Price(USD): </li><li><input type="text" name="price" /></li>
            <li><input type="submit" /></li>
        </form>
    </ul>
</body>
</html>

<?php
    $db= pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=1234");
    $query= "INSERT INTO book VALUES ('$_POST[bookid]', '$_POST[book_name]', '$_POST[author]', '$_POST[publisher]','$_POST[dop]','$_POST[price]')";

    $result= pg_query($query);
?>