<?php
    try 
    {
        $pdo = new PDO("mysql:host=localhost;dbname=Votes","root","");
    }
    catch (PDOException $e)
    {
        die ("Erreur de connection à la base de données : ".$e->getMessage());
    }