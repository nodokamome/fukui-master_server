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

$serch1 = $_POST['serch1'];

if (strlen($serch1) > 3) {
    $sql = "SELECT * FROM user WHERE userId = '$serch1'";
    $result = $mysqli -> query($sql);

    foreach ($result as $row) {
        $rank = $row['rank'];
        $name = $row['name'];
        $pref = $row['pref'];
        $score = $row['score'];
        $fossil = $row['fossil'];
    }
    $arr = array('rank' => $rank, 'name' => $name, 'pref' => $pref, 'score' => $score, 'fossil' => $fossil);
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
} else {
    $sql = "SELECT * FROM user WHERE rankNo = '$serch1'";
    $result = $mysqli -> query($sql);

    foreach ($result as $row) {
        $rank = $row['rank'];
        $name = $row['name'];
        $pref = $row['pref'];
        $score = $row['score'];
        $fossil = $row['fossil'];
    }
    $arr = array('rank' => $rank, 'name' => $name, 'pref' => $pref, 'score' => $score, 'fossil' => $fossil);
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
}
if (!$result) {
    echo $mysqli->error;
    exit();
}
// データベース切断
$mysqli->close();
