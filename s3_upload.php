<!DOCTYPE html>
<html>
<head>
<title>データ処理</title>
<meta charset="utf-8">
</head>
<body>
<?php

//以下の★の個所を適宜修正してください。
$bucket = '★バケット名★';
$region = '★リージョン名★';

//S3にアップロードする準備
require_once "vendor/autoload.php";
use Aws\S3\S3Client;


// S3クライアントを作成
$s3 = new S3Client(array(
    'version' => 'latest',
    'region' => $region, // リージョンの設定
));

// HTTPアップロードされたかどうかを確認
if (isset($_FILES["input_file"]["error"]) && $_FILES["input_file"]["error"] == UPLOAD_ERR_OK) {
    // アップロードファイルの取得
    $fileName = $_FILES["input_file"]["name"]; // オリジナルのファイル名
    $fileTmpName = $_FILES["input_file"]["tmp_name"]; // 一時ファイル名


    try {
        // S3バケットにファイルをアップロード
        $result = $s3->putObject([
            'Bucket'       => $bucket,
            'Key'          => $fileName,
            'Body'         => fopen($fileTmpName, 'rb'),
            'ACL'          => 'private', 
            'ContentType'  => mime_content_type($fileTmpName)
        ]);
        echo "<p>ファイルが正常にアップロードされました。</p>";
    } catch (Aws\Exception\AwsException $e) {
        // AWSへのアップロードに失敗した場合のエラーハンドリング
        echo "<p>ファイルのアップロードに失敗しました: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>ファイルが選択されていません、またはアップロードエラーが発生しました。</p>\n";
}
?>
</body>
</html>