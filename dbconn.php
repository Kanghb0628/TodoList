<?php
//2. 데이터베이스 연결
//db conn.php

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "1234";
$mysql_db = "project";


//mysql 데이터베이스 연결

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if(!$conn) { //연결 오류 발생시 스크립트 종료
    die ("연결 샐패: '".mysqli_connect_error());
}

ini_set('display_error', 'off'); // php에서 발생하는 오류 메시지를 숨김
?>
