<?php
    $dsn = 'mysql:host=sql6.freesqldatabase.com;dbname=sql6458223';
    $username = 'sql6458223';
    $password = 'wVVHK9HxK4';

    try{
        $db = new PDO($dsn,$username,$password);
    } catch(PDOException $e){
        $error_message = $e->getMessage();
        exit();
    }