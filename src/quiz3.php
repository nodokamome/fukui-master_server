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


$serch1 = $_POST['serch1'];
$serch2 = $_POST['serch2'];
$serch3 = $_POST['serch3'];

$sql = "SELECT * FROM quiz WHERE city = '$serch1' and area = '$serch2' and q_No = '$serch3'";
$result = $mysqli -> query($sql);

foreach ($result as $row) {
    $quiz = $row['question'];
    $choice1 = $row['choice1'];
    $choice2 = $row['choice2'];
    $choice3 = $row['choice3'];
    $choice4 = $row['choice4'];
    $ans = $row['ans'];
}
$arr = array('quiz' => $quiz, 'choice1' => $choice1, 'choice2' => $choice2, 'choice3' => $choice3, 'choice4' => $choice4, 'ans' => $ans);
echo json_encode($arr, JSON_UNESCAPED_UNICODE);


//クエリー失敗
if (!$result) {
    echo $mysqli->error;
    exit();
}


// データベース切断
$mysqli->close();
