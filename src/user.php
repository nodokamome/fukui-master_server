<?php

//データベースから情報取得
require("../config.php");
$server = "localhost";
$username =  $DB_USERNAME;
$password = $DB_PASSWORD;
$dbname =$DB_DATABASE;

$mysqli = new mysqli($server, $username, $password, $dbname);
$mysqli->set_charset('utf8');
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    $mysqli->set_charset("utf-8");
}

$sql = "SELECT * FROM user";

$result = $mysqli -> query($sql);

//クエリー失敗
if (!$result) {
    echo $mysqli->error;
    exit();
}

//レコード件数
$row_count = $result->num_rows;

//連想配列で取得
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
}


//結果セットを解放
$result->free();

// データベース切断
$mysqli->close();

?>

<html>
<head>
<meta charset="utf-8">
<title>ユーザー登録ページ</title>
</head>

<body>
  <h3>ユーザー登録</h3>　　　　　　<a href="../index.html">ホームに戻る</a>
<hr>
  <form action="user2.php" method="post">
   都道府県：<select name="pref">
<option>北海道</option>
<option>青森県</option>
<option>岩手県</option>
<option>宮城県</option>
<option>秋田県</option>
<option>山形県</option>
<option>福島県</option>
<option>茨城県</option>
<option>栃木県</option>
<option>群馬県</option>
<option>埼玉県</option>
<option>千葉県</option>
<option>東京都</option>
<option>神奈川県</option>
<option>新潟県</option>
<option>富山県</option>
<option>石川県</option>
<option>福井県</option>
<option>山梨県</option>
<option>長野県</option>
<option>岐阜県</option>
<option>静岡県</option>
<option>愛知県</option>
<option>三重県</option>
<option>滋賀県</option>
<option>京都府</option>
<option>大阪府</option>
<option>兵庫県</option>
<option>奈良県</option>
<option>和歌山県</option>
<option>鳥取県</option>
<option>島根県</option>
<option>岡山県</option>
<option>広島県</option>
<option>山口県</option>
<option>徳島県</option>
<option>香川県</option>
<option>愛媛県</option>
<option>高知県</option>
<option>福岡県</option>
<option>佐賀県</option>
<option>長崎県</option>
<option>熊本県</option>
<option>大分県</option>
<option>宮崎県</option>
<option>鹿児島県</option>
<option>沖縄県</option>
   </select>
   <br><br>

   ユーザーId：<br>
   <input name="userId" size="35">
   <br>
   ユーザー名：<br>
   <input name="name" size="35">
   <br><br>
   スコア(クイズ)：<input name="score" value="0" size="35"><br>
   化石の数：<input name="fossil" value="0" size="35"><br><br>
   コメント：<input name="comment" size="35"><br>
   順位：<input name="rank" size="35"><br><br>
   画像パス：<input name="my_img" size="35"><br>
   <input type="submit" value="送信" style="width:60px;margin-left:450px"><br>　
  </form>
  <br>
  <hr>
  <h3>ユーザー一覧</h3>



  <table border="1">
    <tr><th>No</th><th>UserId</th><th><font>都道府県</font></th><th>ユーザー名</th><th>スコア</th><th>化石の数</th><th>コメント</th><th>順位</th><th>順位No</th><th>画像パス</th></tr>

  <?php

  foreach ($rows as $row) {
      ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['userId']; ?></td>
    <td><?php echo htmlspecialchars($row['pref'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars($row['score'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars($row['fossil'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars($row['comment'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars($row['rank'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars($row['rankNo'], ENT_QUOTES, 'UTF-8'); ?></td>
    <td><?php echo htmlspecialchars($row['my_img'], ENT_QUOTES, 'UTF-8'); ?></td>
  </tr>
  <?php
  }

  ?>

  </table>

  </body>



  </html>
