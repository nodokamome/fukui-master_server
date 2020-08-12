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

$sql = "SELECT * FROM marker";

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
<title>マーカー登録ページ</title>
</head>

<body>
  <h3>マーカー登録</h3>　　　　　　<a href="../index.html">ホームに戻る</a>
<hr>
  <form action="marker2.php" method="get">
   市町村：<select name="city">
     <option>あわら市</option>
     <option>勝山市</option>
     <option>大野市</option>
     <option>坂井市</option>
     <option>永平寺町</option>
     <option>福井市</option>
     <option>越前市</option>
     <option>鯖江市</option>
     <option>越前町</option>
     <option>池田町</option>
     <option>南越前町</option>
     <option>敦賀市</option>
     <option>美浜町</option>
     <option>若狭町</option>
     <option>小浜市</option>
     <option>おおい町</option>
     <option>高浜町</option>
   </select>
   <br><br>
   グループ:<select name="area">
     <option>1</option>
     <option>2</option>
     <option>3</option>
     <option>4</option>
     <option>5</option>
     <option>6</option>
     <option>7</option>
     <option>8</option>
     <option>9</option>
     <option>10</option>
     <option>11</option>
     <option>12</option>
     <option>13</option>
     <option>14</option>
     <option>15</option>
     <option>16</option>
     <option>17</option>
     <option>18</option>
     <option>19</option>
     <option>20</option>
   </select>
   <br><br>
   地名：
   <input type="text" name="place"><br>
   <br><br>
   問題数：
   <input type="text" name="q_count"><br>
   <br><br>
   緯度：<input name="latitude" size="35"><br>
   経度：<input name="longitude" size="35"><br>
   宝の画像パス：<input name="bone" size="35"><br><br>
   <input type="submit" value="送信" style="width:60px;margin-left:450px"><br>　
  </form>
  <br>
  <hr>
  <h3>マーカー一覧</h3>



  <table border="1">
    <tr><th>id</th><th><font>市長村</font></th><th>グループ</th><th>地名</th><th>問題数</th><th>緯度</th><th>経度</th><th>宝の画像パス</th></tr>

  <?php

  foreach ($rows as $row) {
      ?>
  <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['city'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['area'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['place'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['q_count'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['latitude'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['longitude'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['bone'], ENT_QUOTES, 'UTF-8'); ?></td>
  </tr>
  <?php
  }
  ?>

  </table>

  </body>



  </html>
