

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>帳號資訊</title>
</head>
<body>
<h1 align = "center">帳號資訊</h1>

<form action="" method="post">
    <p align = "center">帳號搜尋
    <input type="text" name="keyword">
    <input type="submit" value="搜尋"></p>
</form>

<p align = "center"><a href='create.php'>新增資料</a></p>
<table border="1" align = "center">
    <tr>
        <th>帳號</th>
        <th>姓名</th>
        <th>性別</th>
        <th>生日</th>
        <th>信箱</th>
        <th>備註</th>
        <th>動作</th>
    </tr>
<?php

$pdo = new PDO('mysql:host=localhost; dbname=List; charset=utf8',
    'root', '');

if (isset($_REQUEST['keyword'])) {
    $sql=$pdo->prepare('select * from account_info where name like ?');
    $sql->execute(['%'.$_REQUEST['keyword'].'%']);
} else {
    $sql=$pdo->prepare('select * from account_info');
    $sql->execute([]);
}

foreach ($sql->fetchAll() as $row) {
//foreach ($pdo->query('select * from account_info') as $row) {
    echo '<tr>';
    echo '<td>', $row['account'], '</td>';
    echo '<td>', $row['userName'], '</td>';
    echo '<td>', $row['sex'], '</td>';
    echo '<td>', $row['birthday'], '</td>';
    echo '<td>', $row['email'], '</td>';
    echo '<td>', $row['note'], '</td>';
    echo "<td><a href='update.php?id=".$row['id']."'>修改</a> ";
    echo "<a href='delete.php?id=".$row['id']."'>刪除</a></td>";
    echo '</tr>';
}


?>
</table>
</body>
</html>