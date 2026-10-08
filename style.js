document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');

  if (form) {
    form.addEventListener('submit', function (event) {
      //エラー表示エリアのリセット
      const errorContainer = document.getElementById('error-message');
      if (errorContainer) {
        errorContainer.innerHTML = '';
      }

      //入力値を取得
      const name = document.getElementById('name') ? document.getElementById('name').value.trim() : '';
      const companyName = document.getElementById('companyName') ? document.getElementById('companyName').value.trim() : '';
      const email = document.getElementById('email') ? document.getElementById('email').value.trim() : '';
      const age = document.getElementById('age') ? document.getElementById('age').value.trim() : '';
      const message = document.getElementById('message') ? document.getElementById('message').value.trim() : '';

      const errors = [];

      //バリデーションチェック
      if (name === '') {
        errors.push('お名前が入力されていません。');
      }
      if (companyName === '') {
        errors.push('会社名が入力されていません。');
      }
      if (email === '') {
        errors.push('メールアドレスが入力されていません。');
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        errors.push('メールアドレスの形式が正しくありません。');
      }
      if (age === '') {
        errors.push('年齢が入力されていません。');
      } else if (isNaN(age)) {
        errors.push('年齢は半角数字で入力してください。');
      }
      if (message === '') {
        errors.push('お問合せ内容が入力されていません。');
      }

      //エラーが存在する場合（送信キャンセル ＋ アラート ＋ 画面表示）
      if (errors.length > 0) {
        // 送信キャンセル
        event.preventDefault();

        alert('必須項目が未入力です。入力内容をご確認ください。');

        if (errorContainer) {
          const ul = document.createElement('ul');
          ul.className = 'color';

          errors.forEach(function (error) {
            const li = document.createElement('li');
            li.textContent = error;
            ul.appendChild(li);
          });

          errorContainer.appendChild(ul);
        }

        window.scrollTo({ top: 0, behavior: 'smooth' });
        return;
      }

      //エラーがない場合（確認ダイアログの表示）
      const confirmMessage =
        "下記の内容を本当に送信しますか？\n\n" +
        "お名前➡️ " + name + "\n" +
        "会社名➡️ " + companyName + "\n" +
        "メールアドレス➡️ " + email + "\n" +
        "年齢➡️ " + age + "\n" +
        "お問い合わせ内容➡️ " + message;

      if (!confirm(confirmMessage)) {
        event.preventDefault(); // キャンセル時は送信中止
      }
    });
  }




  //背景色変更ボタンの処理
  const colorBtn = document.querySelector('footer button');
  const footer = document.querySelector('footer');
  const colors = ['blue', 'red', 'yellow', 'gray'];
  let currentIndex = 0;

  if (colorBtn && footer) {
    colorBtn.addEventListener('click', function () {
      footer.style.backgroundColor = colors[currentIndex];
      currentIndex = (currentIndex + 1) % colors.length;
    });
  }
});