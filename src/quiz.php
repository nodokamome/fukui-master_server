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

$sql = "SELECT * FROM quiz";

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
<title>クイズ登録ページ　　　　　　テーブル：quiz</title>
</head>

<body>
  <h3>クイズ登録</h3>　　　　　　<a href="../index.html">ホームに戻る</a>
<hr>
  <form action="quiz2.php" method="get">
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
   グループ:<select name="group">
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

   問題番号:<select name="q_No">
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
   問題：<br>
   <textarea type="freeans" name="quiz" rows="5" cols="70"/></textarea>
   <br><br>
   選択肢1：<input name="choice1" size="35"><br>
   選択肢2：<input name="choice2" size="35"><br>
   選択肢3：<input name="choice3" size="35"><br>
   選択肢4：<input name="choice4" size="35"><br><br>
   答え：<input name="ans" size="35"><br>
   <input type="submit" value="送信" style="width:60px;margin-left:450px"><br>　
  </form>
  <br>
  <hr>
  <h3>クイズ一覧</h3>



  <table border="1">
    <tr><th>id</th><th><font>市長村</font></th><th>グループ</th><th>問題番号</th><th>問題</th><th>選択肢１</th><th>選択肢２</th><th>選択肢３</th><th>選択肢４</th><th>答え</th></tr>

  <?php

  foreach ($rows as $row) {
      ?>
  <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['city'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['area'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?php echo htmlspecialchars($row['q_No'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['question'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['choice1'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['choice2'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['choice3'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['choice4'], ENT_QUOTES, 'UTF-8'); ?></td>
  <td><?php echo htmlspecialchars($row['ans'], ENT_QUOTES, 'UTF-8'); ?></td>
  </tr>
  <?php
  }
  ?>

  </table>

  </body>



  </html>
