<?php

header('Content-type: text/plain; charset=UTF-8');
header('Content-Transfer-Encoding: binary');



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

  $rank;
  $userId;
  //$sql = "UPDATE user SET score = '$myscore', fossil = '$myfossil' WHERE userId = '$userId'";
  $sql = "SELECT  userId, score, (select count(*) FROM user b WHERE a.score < b.score) + 1 rank FROM user a ORDER BY rank ASC";
  $result = $mysqli -> query($sql);

  foreach ($result as $row) {
      $rank =  $row['rank'];
      $userId =  $row['userId'];

      $sql = "UPDATE user SET rank = '$rank' WHERE userId = '$userId'";
      $result2 = $mysqli -> query($sql);
  }

  $sql = "SELECT  userId, score, fossil,(select count(*) FROM user b WHERE a.rank = b.rank and a.fossil < b.fossil) + rank rank FROM user a ORDER BY rank ASC";
  $result = $mysqli -> query($sql);

  foreach ($result as $row) {
      $rank =  $row['rank'];
      $userId =  $row['userId'];

      $sql = "UPDATE user SET rank = '$rank' WHERE userId = '$userId'";
      $result2 = $mysqli -> query($sql);
  }

  $count = 0;

  for ($i = 1; $i <= 11; $i++) {
      $sql = "SELECT * FROM user";
      $result = $mysqli -> query($sql);

      foreach ($result as $row) {
          $rank =  $row['rank'];
          $userId =  $row['userId'];

          if ($rank == $i) {
              $count++;

              $sql = "UPDATE user SET rankNo = '$count' WHERE userId = '$userId'";
              $result2 = $mysqli -> query($sql);
              if ($count == 10) {
                  break;
              }
          }
      }
  }



if (!$result) {
    echo $mysqli->error;
    exit();
}


// データベース切断
$mysqli->close();
