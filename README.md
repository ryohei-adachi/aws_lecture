# 1 Webサーバを構築しよう！

## ①EC2インスタンスの準備

+ AWSにログインしてください。




+ AWSのマジメントコンソールを開き、リージョンを選択してください。
  + 本手順書では、「東京」リージョンに選択したうえで進めます。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/a5490b76-9d0d-4306-a100-3adc8b9fc3b4)

+ マネジメントコンソールの検索部分に「EC2」と入力・検索を行い、EC2サービスを選択してください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/2704af17-6537-492f-bd55-61f00c010825)

+ 左メニューの「インスタンス」を選択して、「インスタンスを起動」をクリックしてください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/17c66e10-3095-41e4-9baf-dd799a6c5549)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/6025e6ac-d8d2-4207-a74b-96a10b8a4af5)

+ 「Launch an instance」では下記の内容を入力・選択する
  + 名前: 好きなサーバ名を入力してください
  + Amazon マシンイメージ (AMI): Amazon Linux 2023
  + インスタンスタイプ: t2.micro
  + キーペア (ログイン) : 新しいキーペアの作成をクリックして、キーペアを取得してください(ログイン時に使用します。)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/05e292b4-55e6-48bd-addd-05e5a4ee682a)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/26f81d98-07d2-482e-b37f-545b5e72b1cb)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/ecc10718-aa70-4d39-b9fa-bd925ce0855b)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/71602f1e-f76d-49af-9ba6-c0a4c516c517)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/fa4d93e0-3cdd-4857-861f-9e032e38ca76)

キーペア名は好きな名前を入力し、キーペアのタイプは「RSA」、プライベートキーファイル形式は「.pem」を選択して、「キーペアを作成」をクリックしてください。

+ 上記の内容の入力が出来ましたら、「インスタンスを起動」をクリックしてください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/027944c3-56a1-4af5-b2fb-926cc96ef7a5)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/84c14c41-10c4-4426-8f9f-7f7cee0712c2)

+ 「すべてインスタンスを表示」を選択して、EC2インスタンスが作成されていることを確認しましょう。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/96175ed0-8179-4b81-b0be-32a5dbdd3809)

