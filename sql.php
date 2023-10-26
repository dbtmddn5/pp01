<?php
$host = 'localhost'; // 데이터베이스 호스트
$dbUsername = 'root'; // 데이터베이스 사용자 이름
$dbPassword = ''; // 데이터베이스 비밀번호
$dbName = 'pp01'; // 데이터베이스 이름
$tableName = 'content'; // 테이블 이름

// 데이터베이스 연결
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// 연결 확인
if ($conn->connect_error) {
    die("Fail to connect: " . $conn->connect_error);
}

// 테이블에서 데이터 가져오기
$sql = "SELECT * FROM $tableName";
$result = $conn->query($sql);

// 테이블 생성
echo "<table>";
echo "<tr><th>性</th><th>名</th><th>生年月日</th>th>作成日</th>th>更新日</th></tr>";

if ($result->num_rows > 0) {
    // 결과 출력
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["lastName"] . "</td><td>" . $row["firstName"] . "</td><td>" . $row["birthday"] . "</td><td>" . $row["createdDay"] . "</td><td>" . "</td><td>" . $row["updatedDay"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>No Data</td></tr>";
}

echo "</table>";

// 연결 종료
$conn->close();
?>
