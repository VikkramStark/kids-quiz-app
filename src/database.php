<?php

$conn="";
$host="localhost";
$username="root";
$password="";
$database="users";
mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);
try{
    $conn=mysqli_connect($host,$username,$password,$database);

    if($conn){
        // echo"connected to database successfully";

    }
}
catch(mysqli_sql_exception){
    // echo"Could not connect to the database";
    // echo"Database connection failed";
        }