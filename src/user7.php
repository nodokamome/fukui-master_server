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

$name = $_POST['name'];
$pref = $_POST['pref'];
$userId = $_POST['userId'];


$sql = "UPDATE user SET name = '$name', pref = '$pref' WHERE userId = '$userId'";
$result = $mysqli -> query($sql);
echo "true";



//クエリー失敗
if (!$result) {
    echo $mysqli->error;
    exit();
}


// データベース切断
$mysqli->close();
