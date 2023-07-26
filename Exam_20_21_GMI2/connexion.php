<?php
    try 
    {
        $pdo = new PDO("mysql:host=localhost;dbname=examen","root","");
    } catch (PDOException $e)
    {
        die ("DataBase connection error! : ".$e->getMessage());
    }