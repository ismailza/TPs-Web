<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=ecole","root","");
} catch (PDOException $e) {
    $e->getMessage();
}
?>