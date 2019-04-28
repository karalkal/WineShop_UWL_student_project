<?php
    $dsn = 'mysql:host=localhost;dbname=21354000';
    $username = '21354000';
    $password = '21354000';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>
