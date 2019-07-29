<?php
$pdo = new PDO('mysql:host=localhost; dbname=List; charset=utf8', 'root', '');
$sql=$pdo->prepare('SELECT * FROM account_info WHERE id = ?');
$sql->execute([$_GET['id']]);
$result = $sql->fetchAll();
$account = $result[0]["account"];
$userName = $result[0]["userName"];
$sex = $result[0]["sex"];
$birthday = $result[0]["birthday"];
$email = $result[0]["email"];
$note = $result[0]["note"];
?>

<html>
 <head>
     <meta charset="UTF-8" />
     <title>修改帳號資料</title>
 </head>
 <body>
     <form action="" method="post" name="formAdd" id="formAdd">
         請輸入帳號：<input type="text" name="account" id="account" value=" <?php echo $account ?>"><br/>
         請輸入姓名：<input type="text" name="name" id="name" value=" <?php echo $userName ?>"><br/>
         請輸入性別：<input type="text" name="sex" id="sex" value=" <?php echo $sex ?>"><br/>
         請輸入生日：<input type="text" name="birthday" id="birthday" value=" <?php echo $birthday ?>"><br/>
         請輸入信箱：<input type="text" name="email" id="email" value=" <?php echo $email ?>"><br/>
         請輸入備註：<input type="text" name="note" id="note" value=" <?php echo $note ?>"><br/>
         <input type="hidden" name="action" value="update">
         <input type="submit" name="button" value="修改">
     </form>
 </body>
</html>

<?php
    $pdo = new PDO('mysql:host=localhost; dbname=List; charset=utf8', 'root', '');
//    $stmt = "UPDATE account_info SET account = ?, name = ?, sex = ?, birthday = ?, email = ?, note = ? WHERE id = ?";
    $sql=$pdo->prepare('UPDATE account_info SET account = ?, userName = ?, sex = ?, birthday = ?, email = ?, note = ? WHERE id =?');
//    $sql=$pdo->prepare($stmt);
    $sql->execute([$_POST['account'],$_POST['name'],$_POST['sex'],$_POST['birthday'], $_POST['email'],$_POST['note'], $_GET['id']]);
?>

