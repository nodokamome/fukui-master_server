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

$serch1 = $_POST['serch1'];

for ($i = 1; $i <= 6 ; $i++) {
    $sql = "SELECT * FROM marker WHERE city = '$serch1' and area = '$i'";
    $result = $mysqli -> query($sql);

    if ($i == 1) {
        foreach ($result as $row) {
            $area1 = $row['place'];
            $q_count1 = $row['q_count'];
            $fossil1 = $row['bone'];
            $latitude1 = $row['latitude'];
            $longitude1 = $row['longitude'];
        }
    }
    if ($i == 2) {
        foreach ($result as $row) {
            $area2 = $row['place'];
            $q_count2 = $row['q_count'];
            $fossil2 = $row['bone'];
            $latitude2 = $row['latitude'];
            $longitude2 = $row['longitude'];
        }
    }
    if ($i == 3) {
        foreach ($result as $row) {
            $area3 = $row['place'];
            $q_count3 = $row['q_count'];
            $fossil3 = $row['bone'];
            $latitude3 = $row['latitude'];
            $longitude3 = $row['longitude'];
        }
    }
    if ($i == 4) {
        foreach ($result as $row) {
            $area4 = $row['place'];
            $q_count4 = $row['q_count'];
            $fossil4 = $row['bone'];
            $latitude4 = $row['latitude'];
            $longitude4 = $row['longitude'];
        }
    }
    if ($i == 5) {
        foreach ($result as $row) {
            $area5 = $row['place'];
            $q_count5 = $row['q_count'];
            $fossil5 = $row['bone'];
            $latitude5 = $row['latitude'];
            $longitude5 = $row['longitude'];
        }
    }
    if ($i == 6) {
        foreach ($result as $row) {
            $area6 = $row['place'];
            $q_count6 = $row['q_count'];
            $fossil6 = $row['bone'];
            $latitude6 = $row['latitude'];
            $longitude6 = $row['longitude'];
        }
    }
}

$arr = array(
'place1' => $area1, 'q_count1' => $q_count1, 'fossil1' => $fossil1, 'latitude1' => $latitude1, 'longitude1' => $longitude1,
'place2' => $area2, 'q_count2' => $q_count2, 'fossil2' => $fossil2, 'latitude2' => $latitude2, 'longitude2' => $longitude2,
'place3' => $area3, 'q_count3' => $q_count3, 'fossil3' => $fossil3, 'latitude3' => $latitude3, 'longitude3' => $longitude3,
'place4' => $area4, 'q_count4' => $q_count4, 'fossil4' => $fossil4, 'latitude4' => $latitude4, 'longitude4' => $longitude4,
'place5' => $area5, 'q_count5' => $q_count5, 'fossil5' => $fossil5, 'latitude5' => $latitude5, 'longitude5' => $longitude5,
'place6' => $area6, 'q_count6' => $q_count6, 'fossil6' => $fossil6, 'latitude6' => $latitude6, 'longitude6' => $longitude6);
echo json_encode($arr, JSON_UNESCAPED_UNICODE);


//クエリー失敗
if (!$result) {
    echo $mysqli->error;
    exit();
}


// データベース切断
$mysqli->close();
