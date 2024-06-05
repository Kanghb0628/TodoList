<?php
// 4. 메인 화면
// 메인 화면 페이지
// /ch16/index.php

include("./dbconn.php"); // DB연결을 위한 dbconn.php 파일을 인클루드합니다.
// include()는 하나의 파일을 여러곳에서 사용할 때 사용하는 내장함수
// todo 테이블에 등록되어있는 목록을 조회
$sql = " SELECT * FROM todo ORDER BY id DESC "; // id 기준 내림차순
                                                // ASC : 오름차순(일반)
$result = mysqli_query($conn, $sql);
mysqli_close($conn); // 데이터베이스 접속 종료
                     // 데이터베이스를 접속 종료하더라도 이미 $result 변수에
                     // SQL 문의 실행 결과를 가지고 있기 때문에 아래쪽에서
                     // 해당 결과를 사용할 수 있음
?>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<div id="toDo" class="container">
    <div class="row justify-content-sm-center">
        <div class="col-sm-5">
            <form action="./add.php" method="POST" class="add_section">
                <div class="card">
                    <h2 class="card-header text-center">강현빈의 할 일 목록</h2>
                    <div class="gw-example">
                        <div class="form-group">
                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   placeholder="무슨 일을 추가 할까요?">

                        </div>
                        <div class="d-grid margin-top-2">
                            <button type="submit" class="btn btn-primary">추가</button>
                          
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row justify-content-sm-center">
        <div class="col-sm-5">
            <section class="show_todo_section margin-top-2">
                <?php if (mysqli_num_rows($result) <=0) { ?>
                    <!--while: ~ endwhile; -->
                    <div class="card gw-example">
                        <div class="card-body box-shadow border-radius-1">
                            등록된 할 일이 없습니다.
                        </div>
                    </div>
                    <?php } ?>
                    <?php while ($row = mysqli_fetch_assoc($result)):  ?>
                    <div class="card card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <input type="checkbox"
                                       class="form-check-input"
                                       onclick="location.href='./check.php?id=<?php echo $row['id'] ?>'"
                                       <?php echo $row['checked'] ? 'checked' : '' ?>>
                            </div>
                            <!--onclick : 사용자가 요소를 클릭할 때ㅐ 발생하는 이벤트를 처리
                                input 태그의 type 속성이 checkbox로 설정되었으므로
                                checkbox가 선택되었을때 onclick 속성이 실행됨-->
                            <h5 class="<?php echo $row['checked'] ? 'gw-checked' : '' ?>">
                                <?php echo $row['title'] ?>
                            </h5>
                            <!--h5 태그의 클래스 이름에 삼항연산자를 넣고,
                                    채크가 되면 문자열 중앙에 줄을 생성하고 타이틀 출력-->

                        </div>
                        <a href="./remove.php?id=<?php echo $row['id'] ?>"
                           id="<?php echo $row['id'] ?>"
                           class="btn btn-outline-secondar btn-sm">삭제
                        </a>
                        <small>등록일시 : <?php echo $row['datetime'] ?></small>
                        <!--택스트를 작게 표시하는 small 테그-->
                    </div>
                <?php endwhile; ?>    
            </section>
        </div>
    </div>
</div>

</body>
</html>