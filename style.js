document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');

  if (!form) return;

  form.addEventListener('submit', function (event) {
    // エラーメッセージ領域のリセット
    const errorContainer = document.getElementById('error-message');
    if (errorContainer) {
      errorContainer.innerHTML = '';
    }

    // document.getElementById().value で値を取得
    const name = document.getElementById('name') ? document.getElementById('name').value.trim() : '';
    const companyName = document.getElementById('companyName') ? document.getElementById('companyName').value.trim() : '';
    const email = document.getElementById('email') ? document.getElementById('email').value.trim() : '';
    const age = document.getElementById('age') ? document.getElementById('age').value.trim() : '';
    const message = document.getElementById('message') ? document.getElementById('message').value.trim() : '';

    const errors = [];

    // バリデーションチェック
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

    // エラーが存在する場合
    if (errors.length > 0) {
      // フォームの送信をキャンセル
      event.preventDefault();

      // エラー表示用の <ul> 要素を作成
      const ul = document.createElement('ul');
      ul.className = 'color';

      errors.forEach(function (error) {
        const li = document.createElement('li');
        li.textContent = error;
        ul.appendChild(li);
      });

      if (errorContainer) {
        errorContainer.appendChild(ul);
      }

      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  });
});


// エラーメッセージの表示
document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');

  if (!form) return;

  form.addEventListener('submit', function (event) {
    const name = document.getElementById('name') ? document.getElementById('name').value.trim() : '';
    const companyName = document.getElementById('companyName') ? document.getElementById('companyName').value.trim() : '';
    const email = document.getElementById('email') ? document.getElementById('email').value.trim() : '';
    const age = document.getElementById('age') ? document.getElementById('age').value.trim() : '';
    const message = document.getElementById('message') ? document.getElementById('message').value.trim() : '';

    // いずれかの項目が空欄
    if (name === '' || companyName === '' || email === '' || age === '' || message === '') {
      // 送信をキャンセル
      event.preventDefault();

      // アラート
      alert('必須項目が未入力です。入力内容をご確認ください。');
    }
  });
});


document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');

  if (!form) return;

  form.addEventListener('submit', function (event) {
    const name = document.getElementById('name').value.trim();
    const companyName = document.getElementById('companyName').value.trim();
    const email = document.getElementById('email').value.trim();
    const age = document.getElementById('age').value.trim();
    const message = document.getElementById('message').value.trim();

    if (name === "" || companyName === "" || email === "" || age === "" || message === "") {
      //送信を中止
      event.preventDefault();
      //アラート
      alert("必須項目が未入力です。入力内容をご確認ください。");
    }
  });
});



// 確認ダイアログメッセージ
document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');

  if (!form) return;
  form.addEventListener('submit', function (event) {
    const name = document.getElementById('name').value.trim();
    const companyName = document.getElementById('companyName').value.trim();
    const email = document.getElementById('email').value.trim();
    const age = document.getElementById('age').value.trim();
    const message = document.getElementById('message').value.trim();

    //未入力項目がある場合のチェック
    if (name === "" || companyName === "" || email === "" || age === "" || message === "") {
      event.preventDefault();
      alert("必須項目が未入力です。入力内容をご確認ください。");
      return;
    }
    //内容を確認するダイアログメッセージ
    const confirmMessage =
      "下記の内容を本当に送信しますか？\n\n" +
      "お名前➡️ " + name + "\n" +
      "会社名➡️ " + companyName + "\n" +
      "メールアドレス➡️ " + email + "\n" +
      "年齢➡️ " + age + "\n" +
      "お問い合わせ内容➡️ " + message;

    // confirmダイアログを表示し、「キャンセル」が押された場合は送信を中止
    if (!confirm(confirmMessage)) {
      event.preventDefault();
    }
  });
});



// 背景色変更ボタン
document.addEventListener('DOMContentLoaded', function () {
  const colorBtn = document.querySelector('footer button');
  const footer = document.querySelector('footer');
  const colors = ['blue', 'red', 'yellow', 'gray'];
  let currentIndex = 0;

  if (colorBtn && footer) {
      // ボタンがクリックされたときの処理
    colorBtn.addEventListener('click', function () {
      footer.style.backgroundColor = colors[currentIndex];
      // 次の色に進める
      currentIndex = (currentIndex + 1) % colors.length;
    });
  }
});