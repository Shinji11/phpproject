<script>(function(){
      // 標準メッセージの上書き(日本語化等)とカスタム項目のメッセージを設定します。
      $.extend($.validator.messages, {
        email: 'メールアドレスの形式で入力して下さい。(例: x@example.com)',
        equalTo: 'もう一度同じ値を入力して下さい。',
        minlength: '{0}文字以上入力して下さい。',
        required: '入力して下さい。',
 
        // (カスタム項目の標準メッセージです)
        postal: '郵便番号の形式で入力して下さい。(例: 000-0000, 0000000)',
        username: '半角英数字、アンダースコア(_)のいずれかで入力して下さい。',
      });
 
      // 入力項目の検証ルールを定義します(後で$.validate({ rules: rules })で設定します)。
      var rules = {
        username: 'username',
        email_confirm: { equalTo: '[name=email]' },
        password: { minlength: 6 },
        password_confirm: { equalTo: '[name=password]' },
        postal: 'postal'
      };
 
      // 入力項目ごとにエラーメッセージを定義します(後で$.validate({ messages: messages })で設定します)
      var messages = {
        username: {
          required: 'ユーザー名を入力して下さい。',
        },
        password: {
          required: 'パスワードを入力して下さい。',
          minlength: 'パスワードは{0}文字以上入力して下さい。'
        }
      };
 
      // カスタムルールを定義します($.validator.addMethod(項目名, 検証ルール)で設定します)。
      var methods = {
        postal: function(value, element){
          return this.optional(element) || /^[0-9]{3}-?[0-9]{4}$/.test(value);
        },
        username: function(value, element){
          return this.optional(element) || /[a-zA-Z0-9_]/.test(value);
        }
      };
      $.each(methods, function(key){
        $.validator.addMethod(key, this);
      });
 
      $(function(){
        $('#form').validate({
          rules: rules,
          messages: messages,
 
          //// (下記コメントを外すと一箇所にエラーメッセージが出力されます)
          //errorContainer: $("#form .error-container"),
          //errorLabelContainer: $("#form .error-container ul"),
          //wrapper: 'li',
 
          // エラーの位置を設定します。
          // 下記ではラジオボタンとチェックボックスのエラーメッセージを
          // グループの最後に表示するように調整しています。
          errorPlacement: function(error, element){
            if (element.is(':radio, :checkbox')) {
              error.appendTo(element.parent());
            } else {
              error.insertAfter(element);
            }
          }
        });
      });
    })();</script>