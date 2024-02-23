# 1 Webサーバを構築しよう！

## ①EC2インスタンスの準備

+ AWSにログインしてください。

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/4c8cec3b-b46a-4e04-a90c-f5378e9f63a6" width="70%" />

+ AWSのマジメントコンソールを開き、リージョンを選択してください。
  + 本手順書では、「東京」リージョンに選択したうえで進めます。

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/a5490b76-9d0d-4306-a100-3adc8b9fc3b4" width="70%" />

+ マネジメントコンソールの検索部分に「EC2」と入力・検索を行い、EC2サービスを選択してください。

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/2704af17-6537-492f-bd55-61f00c010825" width="70%" />


+ 左メニューの「インスタンス」を選択して、「インスタンスを起動」をクリックしてください。

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/17c66e10-3095-41e4-9baf-dd799a6c5549" width="70%" />

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/6025e6ac-d8d2-4207-a74b-96a10b8a4af5" width="70%" />

<br>
<br>

+ 「Launch an instance」では下記の内容を入力・選択する
  + 名前: 好きなサーバ名を入力してください
  + Amazon マシンイメージ (AMI): Amazon Linux 2023
  + インスタンスタイプ: t2.micro
  + ネットワークの設定: パブリックIPの自動割り当てを「無効」から「有効」に変えてください
  + キーペア (ログイン) : 新しいキーペアの作成をクリックして、キーペアを取得してください(ログイン時に使用)
    +  キーペア名: 好きな名前を入力してください
    +  キーペアのタイプ: RSA
    +  プライベートキーファイル形式: 「.pem」
      
<br>

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/05e292b4-55e6-48bd-addd-05e5a4ee682a" width="70%" />

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/26f81d98-07d2-482e-b37f-545b5e72b1cb" width="70%" />

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/ecc10718-aa70-4d39-b9fa-bd925ce0855b" width="70%" />

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/71602f1e-f76d-49af-9ba6-c0a4c516c517" width="70%" />

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/fa4d93e0-3cdd-4857-861f-9e032e38ca76" width="70%" />


必要項目を入力をした後、「キーペアを作成」をクリックしてください。

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/63254121-0875-47eb-a8c0-6c0e7958e3bd" width="70%" />

  <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/0a398555-165a-44e3-a2e3-99fe68664a05" width="70%" />


ネットワークの設定ボタンをクリックし、パブリックIPの自動割り当てを「有効」に変えてください

+ 上記の内容の入力が出来ましたら、「インスタンスを起動」をクリックしてください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/027944c3-56a1-4af5-b2fb-926cc96ef7a5)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/84c14c41-10c4-4426-8f9f-7f7cee0712c2)


+ 「すべてインスタンスを表示」を選択して、EC2インスタンスが作成されていることを確認しましょう。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/96175ed0-8179-4b81-b0be-32a5dbdd3809)

## ② セキュリティグループの設定

+ 作成したインスタンスを選択した状態で、「セキュリティタブ」を開き、セキュリティグループを選択してください。
  + 「sg-XXXXXXXXX」というセキュリティグループIDがEC2インスタンスに付与されております。   

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/c163515d-366b-4ae7-a47d-61923e0f4bad)

+ セキュリティグループの設定画面を開き、「インバウンドのルールを編集」をクリックしてください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/cfcaf86d-227c-4f50-90c6-7172533f248a)

+ 以下のルールを追加して、「ルールを保存」ボタンをクリックしてください。
  + タイプ: SSH
    + ソース: Anywhere-IPv4 か マイIP (マイIPのほうが望ましい。)
  + タイプ: HTTP
    + ソース: Anywhere-IPv4

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/bc998a8c-580f-4b45-97e2-cb4e502a502d)


## ③EC2インスタンスにssh接続する

+ EC2インスタンスのパブリックIPアドレスを確認してください。

  ![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/6a27c26e-1eb6-49d9-b2f4-053dac0427c5)


### Windowsユーザの方

+ Tera Term5を開き、ホストにEC2インスタンスのパブリックIPアドレスを入力して、OKをクリックする。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/1f36595f-3aec-4143-8288-d1e1b2609e94)

+ 続行をクリックする。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/3070e9e4-f7dd-497b-807a-747d28b307b9)

+ ユーザ名に「ec2-user」、認証方式は「RSA/DSA/ECDSA/ED25519鍵を使う」を選択してください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/7a691b46-2d8f-47bc-8bbb-70d53c1e29a9)

+ 秘密鍵の個所に、EC2インスタンス作成時に生成したキーペア(.pemファイル)を指定してください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/4e289e7a-a83b-4b6f-a47d-58174764999e)


![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/e7aca950-e189-40d5-b891-4b692663c529)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/67ca8b9b-dd7f-4dff-b31a-87c053732fea)

+ 「OK」をクリックして、EC2インスタンスに入れることを確認してください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/f8dfc541-f812-4cff-8cfa-a1c0a4065b10)

## ④ApacheとPHPのインストール

+ ターミナルに下記のコマンドを実行してください。(1行ずつ入力をお願いします。)

```
sudo dnf update
sudo dnf install -y httpd
sudo dnf install -y php php-cli php-common php-mbstring php-gd php-xml php-mysqlnd
sudo chmod 777 -R /var/www/html/
```

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/cb42c0e6-443c-4a34-9cd9-0b87bc75e267" width="50%" />

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/078716cf-1da9-4e60-af85-92ef58d71446" width="50%" />


## ⑤Composerインストール

+ ターミナルに下記のコマンドを実行してください。

```
cd
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer
```

## ⑥AWS SDKインストール

+ ターミナルに下記のコマンドを実行してください。

```
cd
composer require aws/aws-sdk-php
```

+ 「vendor」というディレクトリファイルが存在することを確認してください。

```
ls -la
```

 <img src="https://github.com/ryohei-adachi/aws_lecture/assets/75190594/9f8f6bb7-e684-4407-ac85-d796c7dee0f7" width="50%" />


+ 「vendor」ディレクトリファイルを/var/www/htmlディレクトリファイルの配下に移動させます。

```
mv  vendor /var/www/html/
ls -la /var/www/html/
```
![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/cb8cc28e-cc87-4039-847b-bf168fd36c20)

## ⑦Webサーバの起動およびアクセス確認

+ 以下のコマンドを入力してください。

```
sudo systemctl start httpd
sudo systemctl enable httpd
```

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/7828a031-cc51-4f2d-87e5-10268b99f0f4)

+ ブラウザを開き、以下のURLをアクセスして、Webページが表示されることを確認してください。

http://(EC2インスタンスのパブリックIPアドレス)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/fe906750-0b2a-4c4c-811b-e87770e100fa)


# 2 ファイルアップロードができるWebサイトを制作しよう！

ここからは、EC2インスタンスとS3を連携したアプリを開発します。

## ①IAMロールの設定

EC2からS3に対して操作を行う場合、EC2に対して、S3操作用のIAMロール(アクセス権限)を設定する必要があります。

+ マネジメントコンソールの検索部分に「IAM」と入力して、「IAM」を選択してください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/6277c854-8456-497b-84e5-4bc57e83dc20)

+ 左メニューから「ロール」を選択して、「ロールを作成」ボタンをクリックしてください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/b18aa6a1-9bf2-43d4-b250-dbcf62b25864)


+ 「信頼されたエンティティタイプ」は「AWSサービス」、ユースケースは「EC2」を選択して、「次へ」を押してください。
![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/81015f74-9b88-4a84-a704-070de1a9a6a1)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/86c60440-951e-483a-a164-f380cf3dfa27)

+ 許可ポリシーでは、「S3」と検索して、「AmazonS3FullAccess」にチェックを入れて、「次へ」を押してください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/8150e445-8f5b-4a78-adcd-9584d907559e)

+ ロール名には、分かりやすいロール名称を記載して、「ロールを作成」をクリックしてください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/ecece8df-906d-40df-8135-1ad023268262)

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/059eda35-03e4-4fc9-881a-710bcc5ba1c8)

+ 「EC2」で検索を行い、EC2の設定画面に戻ります。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/fe03e9bc-d228-4a1c-9dba-4e74d545b7e7)

+ 左のメニューから「インスタンス」を選択して、作成したEC2インスタンスを選択します。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/ab31e01d-3e36-47be-8dc8-16ba4c0a4a14)

+ アクション > セキュリティ > IAMロールを変更を選択してください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/c482c35c-ab49-4bc1-939a-880d6c192886)

+ IAMロールに、上記で作成したロールを選択して、「IAMロールの更新」をクリックしてください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/15bce2e4-c382-4d73-a8f5-589ba2e5ae95)

以上で、ロールの設定は完了です。

## ②S3バケットの準備

+ マネジメントコンソールの検索部分に「S3」と入力して、「S3」を選択してください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/84fd6152-0027-4ee6-87ea-55f271e2f4bc)

+ 「バケットを作成」をクリックしてください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/d7a843f6-e0bb-4bd6-b013-58e1023f4111)


+ バケット名を入力してください。(それ以外の項目については、変更なし。)
    + バケット名は、世界中の全AWSユーザ間で唯一(一意)の名前にしないといけません。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/cc4f0fb3-9646-4316-b974-7f442ac065cb)


+「バケットを作成」をクリックして、バケットを作成してください。

![image](https://github.com/ryohei-adachi/aws_lecture/assets/75190594/ed3b404b-b4f7-4d64-a3a0-5c5ffd8e6fef)

## ③Webアプリケーションの開発:

+ GitHubの本リポジトリから以下のファイルをダウンロードしてください。
  + index.html
  + style.css
  + s3_upload.php 

+ s3_upload.phpをテキストエディタで開いて、作成したS3のバケット名を記入します。
