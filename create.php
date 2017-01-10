<?php
require_once 'dbconfig.php';

if ($_POST) {
    $title= $_POST['title'];
    $article = $_POST['article'];

    try {
        $stmt = $db_con->prepare('INSERT INTO little_diary_posts(title, article) VALUES(:title, :article)');
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':article', $article);

        if ($stmt->execute()) {
            echo '日記寫好了';
        } else {
            echo '日記沒能存進去';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
