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

    $stmt = mysqli_prepare($con, 'CREATE TABLE `info` (
        
        `HASH` VARCHAR(100) NOT NULL,
        `TITLE` VARCHAR(50) DEFAULT NULL,
        `DATA` VARCHAR(500) DEFAULT NULL
        )ENGINE=InnoDB DEFAULT CHARSET=latin1;');
    
    
     mysqli_stmt_execute($stmt);

    $stmt->close();
    $con->close();

    echo ("Database Successfully Initialized");
}


	initializeDB();
