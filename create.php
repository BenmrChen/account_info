<html>

<head>
    <meta charset="UTF-8" />
    <title>新增帳號資訊</title>
</head>
<body>
<form action="" method="post" name="formAdd" id="formAdd">
    請輸入帳號：<input type="text" name="account" id="account"><br/>
    請輸入姓名：<input type="text" name="name" id="name"><br/>
    請輸入性別：<input type="text" name="sex" id="sex"><br/>
    請輸入生日：<input type="text" name="birthday" id="birthday"><br/>
    請輸入信箱：<input type="text" name="email" id="email"><br/>
    請輸入備註：<input type="text" name="note" id="note"><br/>
    <input type="hidden" name="action" value="add">
    <input type="submit" name="button" value="新增資料">
    <input type="reset" name="button2" value="重新填寫">
</form>
</body>
</html>

<?php
$standard_E_N = "/^([0-9A-Za-z]+)$/";
$standard_date = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
$standard_email = "/([\w\-]+\@[\w\-]+\.[\w\-]+)/";

if (empty(!$_POST["account"]) && empty(!$_POST["name"]) && empty(!$_POST["sex"]) &&
    empty(!$_POST["birthday"]) && empty(!$_POST["email"]) && empty(!$_POST["note"]) &&
    preg_match($standard_E_N, $_POST['account']) && preg_match($standard_date, $_POST[birthday]) &&
    preg_match($standard_email, $_POST['email'])
    ) {
    $pdo = new PDO('mysql:host=localhost; dbname=List; charset=utf8', 'root', '');
    $sql = $pdo->prepare('INSERT INTO account_info (account, userName, sex, birthday, email, note ) VALUES (?,?,?,?,?,?)');
    $sql->execute([$_POST['account'],$_POST['name'],$_POST['sex'],$_POST['birthday'], $_POST['email'],$_POST['note']]);

} else {
    echo '您輸入的資料有誤或不全，請重新輸入';
}
?>