<?php
//6 할 일 삭제
// 할 일 삭제 페이지
//remove.php

include("./dbconn.php");

$id = $_GET['id'];

if(empty($id)) { 
    echo "<script>alert('삭제 실패 : 고유 ID가 넘어오지 않았습니다,');</script>";
    echo "<script>location.replace('./index.php');</script>";
    exit;
} else {
    $sql = " DELETE FROM todo WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); //데이터베이스 연결 종료
    header("Location:./index.php"); // header() : 해당 파일로 이동
}

?>
 