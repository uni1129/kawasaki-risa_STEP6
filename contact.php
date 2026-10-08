<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合せフォーム</title>
  <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
  <script src="style.js"></script>
</head>

<body>
  <header>
    <h2>お問い合せフォーム</h2>
  </header>

  <div class="sidebar">
    <ul>
      <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">トップページ</a></li>
      <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">人気投稿</a></li>
      <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">エンジニアおすすめ商品</a></li>
      <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">エンジニアおすすめ記事</a></li>
      <li><a href="https://github.com/uni1129/kawasaki-risa_STEP5">投稿ページ</a></li>
    </ul>
  </div>

  <div id="error-message"></div>

  <form action="confirm.php" method="post">
    <main>
      <table border="3">
        <tr>
          <th>お名前</th>
          <!-- 2. name 属性を追加 -->
          <td><input type="text" name="name" size="40" class="text" id="name" ></td>
        </tr>
        <tr>
          <th>会社名</th>
          <td><input type="text" name="companyName" size="40" class="text" id="companyName" ></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td><input type="text" name="email" size="40" class="text" id="email" ></td>
        </tr>
        <tr>
          <th>年齢</th>
          <td><input type="text" name="age" size="40" class="text" id="age" ></td>
        </tr>
        <tr>
          <th>お問い合せ内容</th>
          <td><textarea name="message" placeholder="お問合せ内容" id="message" ></textarea></td>
        </tr>
      </table>
    </main>

    <footer>
      <input type="submit" value="送信">
      <p>横のボタンを押すとfooterの背景色が変わります。</p>
      <button type="button" id="button">押してみてね！</button>
    </footer>
  </form>
</body>

</html>