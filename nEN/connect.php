<?php

//connect to database
$conn = mysqli_connect('localhost', 'nen', '1234', 'usersdb');

//check connection
if(!$conn){
    echo 'connection error:'.mysqli_connect_error();
}

//write query for all users
$sql = 'SELECT firstName, lastName FROM userregistration';

//Make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

print_r($users);
?>