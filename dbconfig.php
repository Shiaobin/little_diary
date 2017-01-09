<?php
    $db_host = 'localhost';
    $db_name = 'little_diary';
    $db_user = 'little_diary';
    $db_pass = ')Qq3O?2zzc,,e!66!b9ZD~Zm@0[25g';
    $db_option = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];

    try {
        $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass, $db_option);
        $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
