<?php

    try
    {
        $pdo = new PDO("mysql:host=localhost;dbname=gestion_bank","root","");
    } catch (PDOException $e)
    {
        die ($e->getMessage());
    }