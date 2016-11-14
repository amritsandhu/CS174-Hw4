<?php

function initializeDB()
{
    $config = require("config.php");

    $con = mysqli_connect($config['host'], $config['username'], $config['password']);

    $stmt = mysqli_prepare($con, 'DROP DATABASE IF EXISTS myDatabase;');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE DATABASE myDatabase;' );
    mysqli_stmt_execute($stmt);

    mysqli_select_db($con,"myDatabase");

    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS info;');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con, 'CREATE TABLE info
        (ID INT AUTO_INCREMENT,
        HASH VARCHAR(100) ,
        TITLE VARCHAR(50),
        DATA  VARCHAR(500),
        PRIMARY KEY (ID));');
    
     mysqli_stmt_execute($stmt)

    $stmt->close();
    
    $con->close();

    echo ("Database Successfully Initialized");
}


	initializeDB();
