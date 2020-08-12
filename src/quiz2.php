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

$sql = "SELECT * FROM quiz";

$result = $mysqli -> query($sql);

//クエリー失敗
if (!$result) {
    echo $mysqli->error;
    exit();
}

//レコード件数
$row_count = $result->num_rows;


$id = 0;
$id = $row_count+1;
$city = $_GET['city'];
$group = $_GET['group'];
$q_No = $_GET['q_No'];
$question = $_GET['quiz'];
$choice1 = $_GET['choice1'];
$choice2 = $_GET['choice2'];
$choice3 = $_GET['choice3'];
$choice4 = $_GET['choice4'];
$ans = $_GET['ans'];

if ($question != null || $choice1 != null || $choice2 != null || $choice3 != null || $choice4 != null || $ans != null) {
    $sql = "INSERT INTO quiz (id,city,area,q_No,question,choice1,choice2,choice3,choice4,ans) VALUES ('$id','$city','$group','$q_No','$question','$choice1','$choice2','$choice3','$choice4','$ans')";
    $result = $mysqli -> query($sql);
    echo "入力完了です";
} else {
    echo "すべて入力してください";
}
//クエリー失敗
if (!$result) {
    echo $mysqli->error;
    exit();
}


// データベース切断
$mysqli->close();
