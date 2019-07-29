<?php
    $pdo = new PDO('mysql:host=localhost; dbname=List; charset=utf8', 'root', '');
    $sql=$pdo->prepare('delete from account_info where id=?');
    $sql->execute([$_GET['id']]);
?>