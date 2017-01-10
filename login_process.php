<?php
session_start();
require_once 'dbconfig.php';

if (isset($_POST['btn-login'])) {
    $password = trim($_POST['password']);

    try {
        $stmt = $db_con->prepare('SELECT * FROM little_diary_configs WHERE config="password"');
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();

        if (password_verify($password, $row['value'])) {
            $_SESSION['authed'] = true;
            echo 'ok';
        } else {
            echo '密碼錯誤。';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
