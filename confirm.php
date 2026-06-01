<?php

$name = $_POST['name'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$quiestion = $_POST['question'];
$gender = $_POST['gender'];

$errors = [];

/* 名前　*/
if (!preg_match('/^[ぁ-んァ-ヶー一-龠a-zA-Z\s]+$/u', $name)) {
    $errors[] = '名前の形式が正しくありません';
}

/* 年齢　*/
$age = $_POST['age'] ?? null;
if (!is_numeric($age) || $age < 0 || $age > 150) {
    $errors[] = '年齢は0~150で入力してください';
}

/* 電話番号　*/
$phone = $_POST['phone'] ?? '';
if (!preg_match('/^[0-9\-]+$/',$phone)) {
    $errors[] = '電話番号の形式が正しくありません';
}

/* メール　*/
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'メールアドレスの形式が正しくありません';
}

/* 住所　*/
if (!preg_match('/^[ぁ-んァ-ヶ一ー-龠a-z\s]+$/u', $address)) {
    $errors[] = '住所の形式が正しくありません';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charest="UTF-8">
    <title>入力内容確認</title>
</head>
<body>

<h1>入力内容確認</h1>

<?php if (!empty($errors)): ?>

    <?php foreach ($errors as $error): ?>
        <p style="color:red;">
            <?php echo $error; ?>
        </p>
    <?php endforeach; ?>

    <?php else: ?>

        <P>名前: <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>

        <P>年齢: <?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?></p>

        <P>電話番号: <?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?></p>

        <P>メールアドレス: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>

        <P>住所: <?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?></p>

        <P>質問: <?php echo htmlspecialchars($quiestion, ENT_QUOTES, 'UTF-8'); ?></p>

        <P>性別: <?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?></p>

        <?php endif; ?>

</body>
</html>
