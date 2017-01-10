<?php
session_start();
require_once 'dbconfig.php';

if (isset($_SESSION['authed']) && $_POST) {
    $cur_password = $_POST['cur_password'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    try {
        $stmt = $db_con->prepare('SELECT * FROM little_diary_configs WHERE config="password"');
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($cur_password, $row['value'])) {
            if ($password === $password_confirm) {
                $stmt = $db_con->prepare('UPDATE little_diary_configs SET value=:value WHERE config="password"');
                $stmt->bindParam(':value', password_hash($password, PASSWORD_DEFAULT));
                if ($stmt->execute()) {
                    echo '密碼重設成功';
                }
            } else {
                echo '密碼確認錯誤';
            }
        } else {
            echo '目前密碼錯誤';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
