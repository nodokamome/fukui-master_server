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

$sql = "SELECT * FROM marker";

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
$group = $_GET['area'];
$place = $_GET['place'];
$q_count = $_GET['q_count'];
$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];
$bone = $_GET['bone'];

if ($q_count != null || $place != null || $latitude != null || $longitude != null) {
    $sql = "INSERT INTO marker (id,city,area,place,q_count,latitude,longitude,bone) VALUES ('$id','$city','$group','$place','$q_count','$latitude','$longitude','$bone')";
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
