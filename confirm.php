<?php
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// POST送信チェック
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: contact.php');
  exit;
}

//データ受取
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$companyName = isset($_POST['companyName']) ? trim($_POST['companyName']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$age = isset($_POST['age']) ? trim($_POST['age']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

//PHP側のエラーチェック
$errors = [];
if ($name === '') {
  $errors[] = 'お名前が入力されていません。';
}
if ($companyName === '') {
  $errors[] = '会社名が入力されていません。';
}
if ($email === '') {
  $errors[] = 'メールアドレスが入力されていません。';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = 'メールアドレスの形式が正しくありません。';
}
if ($age === '') {
  $errors[] = '年齢が入力されていません。';
} elseif (!is_numeric($age)) {
  $errors[] = '年齢は半角数字で入力してください。';
}
if ($message === '') {
  $errors[] = 'お問合せ内容が入力されていません。';
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お問い合わせフォーム - 確認画面</title>
  <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
</head>
<body>

  <main>
    <div class="table">
      <!-- エラーがある場合 -->
      <?php if (!empty($errors)): ?>

        <div class="color">
          <h3>入力内容にエラーがあります</h3>
          <ul>
            <?php foreach ($errors as $error): ?>
              <li><?php echo h($error); ?></li>
            <?php endforeach; ?>
          </ul>
          <p><a href="javascript:history.back()">戻って修正する</a></p>
        </div>

      <!--エラーがない場合 -->
      <?php else: ?>

        <table border="3">
          <tr>
            <th>お名前</th>
            <td><?php echo h($name); ?></td>
          </tr>
          <tr>
            <th>会社名</th>
            <td><?php echo h($companyName); ?></td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td><?php echo h($email); ?></td>
          </tr>
          <tr>
            <th>年齢</th>
            <td><?php echo h($age); ?></td>
          </tr>
          <tr>
            <th>お問合せ内容</th>
            <td><?php echo nl2br(h($message)); ?></td>
          </tr>
        </table>

        <form action="send.php" method="post">
          <input type="hidden" name="name" value="<?php echo h($name); ?>">
          <input type="hidden" name="companyName" value="<?php echo h($companyName); ?>">
          <input type="hidden" name="email" value="<?php echo h($email); ?>">
          <input type="hidden" name="age" value="<?php echo h($age); ?>">
          <input type="hidden" name="message" value="<?php echo h($message); ?>">

          <div class="btn">
            <input type="submit" value="送信">
            <input type="button" value="戻る" onclick="history.back()">
          </div>
        </form>

      <?php endif; ?>

    </div>
  </main>

</body>
</html>