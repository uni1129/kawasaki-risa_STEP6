<?php
// 不正アクセス対策：リダイレクト
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: contact.php');
  exit;
}

// 確認画面から届いたデータを受け取る
$name        = isset($_POST['name']) ? $_POST['name'] : '';
$companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
$email       = isset($_POST['email']) ? $_POST['email'] : '';
$age         = isset($_POST['age']) ? $_POST['age'] : '';
$message     = isset($_POST['message']) ? $_POST['message'] : '';

// 宛先
$to = 'risajm.0307@gmail.com';

//件名
$subject = 'お問い合わせがありました';

//本文
$body = "名前 : {$name}\n";
$body .= "会社名 : {$companyName}\n";
$body .= "メールアドレス : {$email}\n";
$body .= "年齢 : {$age}\n";
$body .= "お問い合わせ内容 : {$message}\n";

//メール送信と成功・失敗の判定
$is_success = mb_send_mail($to, $subject, $body);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム-送信完了画面</title>
</head>

<body>
  <header>
    <h1 class="confirmation">お問い合わせフォーム-送信完了画面</h1>
  </header>

  <main>
    <div style="padding: 30px;">
      <?php if ($is_success): ?>
        <!-- 送信成功のメッセージ  -->
        <p>お問い合わせの送信が完了いたしました。</p>
        <p>ありがとうございました。</p>
      <?php else: ?>
        <!--送信失敗のメッセージ -->
        <p class="color">メールの送信に失敗しました。</p>
        <p>恐れ入りますが、時間をおいて再度お試しください。</p>
      <?php endif; ?>

      <p style="margin-top: 20px;">
        <a href="contact.php">お問い合わせフォームに戻る</a>
      </p>
    </div>
  </main>
</body>

</html>