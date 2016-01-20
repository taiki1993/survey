<!DOCTYPE HTML PUBLIC "-//W3C//DTD/ HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>PHP基礎</title>
	</head>

		<body>



		<!-- <?php
		echo'ありがとうございました!!!!!!<br />';
		?>  -->

		<?php
//--------------------------------------------------------------
		//１、db接続
		$dns = 'mysql:dbname=phpkiso;host=localhost';
		
		//接続する為のユーザー情報（下のはxamppの初期状態）
		$user = 'root';
		$password = '';
		
		//DB接続オブジェクトを作成
		$dbh = new PDO($dns,$user,$password);
		
		//接続したDBオブジェクトで文字コードutf8を使うように指定
		$dbh->query('SET NAMES utf8');
//---------------------------------------------------------------


		$nickname=$_POST['nickname'];
		$email=$_POST['email'];
		$goiken=$_POST['goiken'];

		echo $nickname;
		echo '様<br />';
		echo 'ご意見ありがとうございました<br />';
		echo '頂いた意見『';
		echo $goiken;
		echo '』<br />';
		echo $email;
		echo 'にメールを送った！';

//----------------------------------------------------------------
		//2,データベースエンジンにsql文で指令を出す
		$sql = 'INSERT INTO `survey`(`nickname`,`email`,`goiken`)VALUE("'.$nickname.'","'.$email.'","'.$goiken.'")';
		//var_dump($sql);
		$stmt =$dbh->prepare($sql);
		//insert文を実行
		$stmt->execute();

		//3,切断
		$dbh = null;
		//null→何も無いという意味
//----------------------------------------------------------------
		?>

		<body>

</html>