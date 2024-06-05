<?php
//6 할 일 체크
// 할 일 체크 페이지
//check.php

include("./dbconn.php");

$id = $_GET['id'];

if(empty($id)) { 
    echo "<script>alert('체크 실패 : 고유 ID가 넘어오지 않았습니다,');</script>";
    echo "<script>location.replace('./index.php');</script>";
    exit;
} else {
    $sql = " SELECT * FROM todo WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $checked= (int)$row['checked'];
    $checked_re = match ($checked) {
        1 => 0,
        0 => 1,
    }; //index.php의 input 태그 안에 onclick 속성과 연결됨
       //match(){} : 기존에 저장되어 있는 값이 '0'이ㅓ면 '1'로
       //            '1'이면 '0'으로  $checked_re 변수에 저장
    $sql ="UPDATE todo SET checked = '$checked_re' WHERE id = '$id' ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); //데이터베이스 연결 종료
    header("Location:./index.php"); // header() : 해당 파일로 이동
}

?>
 