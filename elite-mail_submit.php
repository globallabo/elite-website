<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Elite Business English Program - Form Submitted</title>
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.min.css">
  </head>
  <body>

  <header>
    <section id="logo-bar">
      <img class="elite-logo" src="images/elite_logo.png" alt="">
      <div class="title">
        <!-- One to One stuff ● -->
        <p>One to One</p>
        <p>英語集中<span class="accent">●</span></p>
        <p>トレーニング</p>
      </div>
      <div class="points">
        <!-- Blue boxes -->
        <p id="point1">英語レッスン</p>
        <p id="point2">学習コーチング</p>
        <p id="point3">オンライン教材</p>
        <p id="point4">英作文添削</p>
      </div>
    </section>
  </header>

  <main>
    <section id="form-submitted">

<?php

	if(isset($_POST['submit'])) {
		// Check for the honeypot input field meant to catch bots
		if(!empty($_POST['website']) or preg_match('/http|www/i',$_POST['message'])) {
			// Give an error message
			echo "<h1>問題が発生しました</h1>";
			echo "<p>URLを含むメッセージは許可されていません。</p>";
			echo "<p><a class=\"button-back\" href=\"javascript:history.back();\">前のページに戻ってください</a></p>";
		}
		else {
			$to = "labo@5star-english.jp"; // this is the recipient's e-mail address
			// $to = "chris@5star-english.jp";
	    $from = $_POST['email'] ?? "無記入"; // this is the sender's e-mail address
	    $name = $_POST['name'] ?? "無記入";
	    $subject = "Linove Elite Business Website Form Submission";
	    $form_message = $_POST['message'] ?? "メッセージはありません。";
	    $message = $name . ", with the e-mail address " . $from . " wrote the following:" . "\n\n" . $form_message . "\n\n";

			$message .= "以下の項目が選択されました。\n\n";
			$application_details = $_POST['application-details'] ?? NULL;
			if ($application_details) {
				$message .= "お申込み内容:\n\n";
				foreach ($application_details as $value) {
					$message .= $value. "\n";
				}
			}
			echo "\n";

	    $headers = "From:" . $from;

			mail($to,$subject,$message,$headers);
	    echo "<h1>送信完了</h1>";
	    echo "<p>お問い合わせありがとうございます。メッセージが正常に送信されました。折り返し担当より回答させていただきますので、今しばらくお待ちください。</p>";
			echo "<p><a class=\"button-back\" href=\"index.html\">前のページに戻ってください</a></p>";
		}
	}
	else {
		echo "<h1>問題が発生しました</h1>";
		echo "<p><a class=\"button-back\" href=\"index.html\">前のページに戻ってください</a></p>";
	}
?>

		</section>
	</main>

</body>
</html>
