<?php
session_start();
require_once 'dbconfig.php';

if (isset($_SESSION['authed']) && $_POST) {
    $time = $_POST['time'];
    $title = $_POST['title'];
    $article = $_POST['article'];

    $stmt = $db_con->prepare('UPDATE little_diary_posts SET title=:title, article=:article WHERE time=:time');
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':article', $article);
    $stmt->bindParam(':time', $time);

    if ($stmt->execute()) {
        echo '日記存好了';
    } else {
        echo '日記沒能存進去';
    }
}
