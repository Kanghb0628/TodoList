<?php
//5 할 일 추가
// 할 일 추가 페이지
//add.php

include("./dbconn.php");

$title = trim($_POST['title']);
//trim() : 문자열 맨 앞과 맨 뒤 여백을 제거해주는 함수

$datetime = date('Y-m-d H:i:s', time());
//date() : 특정 날짜를 나타내는 순차적 일련 번호를 반환
//time() : 시간, 분, 초를 나타내는 함수

if(empty($title)) { // title 변수의 값이 없는 경우 true 반환
    echo "<script>alert('추가 실패 : 내용을 입력하세요');</script>";
    echo "<script>location.replace('./index.php');</script>";
    exit;
} else {
    $sql = " INSERT INTO todo SET title = '$title', datetime = '$datetime' ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); //데이터베이스 연결 종료
    header("Location:./index.php"); // header() : 해당 파일로 이동
}

?>