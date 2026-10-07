<?php
// HTML特殊文字をエスケープする関数（短縮形）
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// POST送信以外のアクセスの場合は contact.php にリダイレクト
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: contact.php');
  exit;
}


// 1. POST送信されたデータを取り出し・余白除去
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$companyName = isset($_POST['companyName']) ? trim($_POST['companyName']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$age = isset($_POST['age']) ? trim($_POST['age']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// 2. 未入力エラーチェック
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


$name_s = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$companyName_s = htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8');
$email_s = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$age_s = htmlspecialchars($age, ENT_QUOTES, 'UTF-8');
$message_s = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム - 確認画面</title>
  <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
</head>

<body>
  <header>
    <h2 class="confirmation">お問い合わせフォーム - 確認画面</h2>
  </header>

  <main>
    <div class="side">
      <ul>
        <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">トップページ</a></li>
        <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">人気投稿</a></li>
        <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">エンジニアおすすめ商品</a></li>
        <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">エンジニアおすすめ記事</a></li>
        <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">投稿ページ</a></li>
      </ul>
    </div>

    <div class="table">
      <table border="3">
        <tr>
          <th>お名前</th>
          <td><?php echo $name_s; ?></td>
        </tr>
        <tr>
          <th>会社名</th>
          <td><?php echo $companyName_s; ?></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td><?php echo $email_s; ?></td>
        </tr>
        <tr>
          <th>年齢</th>
          <td><?php echo $age_s; ?></td>
        </tr>
        <tr>
          <th>お問合せ内容</th>
          <td><?php echo nl2br($message_s); ?></td>
        </tr>
      </table>

      <!-- send.php へ送るフォーム -->
      <form action="send.php" method="post">
        <input type="hidden" name="name" value="<?php echo $name_s; ?>">
        <input type="hidden" name="companyName" value="<?php echo $companyName_s; ?>">
        <input type="hidden" name="email" value="<?php echo $email_s; ?>">
        <input type="hidden" name="age" value="<?php echo $age_s; ?>">
        <input type="hidden" name="message" value="<?php echo $message_s; ?>">

        <div class="btn">
          <input type="button" value="戻る" onclick="history.back()">
          <input type="submit" value="送信">
        </div>
      </form>
    </div>
  </main>

  <footer class="footer"></footer>
</body>

</html>