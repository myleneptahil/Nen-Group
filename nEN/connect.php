<?php

try{
    $myPDO = new PDO("pgsql:host=localhost;dbname=professionalinfo","postgres","1234");
    echo "Connected to PostgreSQL with PDO";
}catch(PDOException $e){
    echo $e-getMessage();
}
?>