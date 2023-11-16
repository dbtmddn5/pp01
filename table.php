<?php
// 데이터베이스 연결 설정
$servername = "localhost:8889";  
$username = "root";    
$password = "root";     
$dbname = "pp01";  

// MySQL에 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

// 등록된 데이터 조회하기
$sql_select = "SELECT * FROM content";
$result = $conn -> query($sql_select);

if ($result -> num_rows > 0) {
    echo "<div style='display: flex; justify-content: center;'>";
    echo "<table style='margin: 100px auto; border-collapse: collapse;'>";
    echo "<tr>
            <th style='border: 1px solid black; background-color: lightgray; width: 20px;'>ID</th>
            <th style='border: 1px solid black; background-color: lightgray;'>姓</th>
            <th style='border: 1px solid black; background-color: lightgray;'>名</th>
            <th style='border: 1px solid black; background-color: lightgray;'>生年月日</th>
            <th style='border: 1px solid black; background-color: lightgray;'>作成日</th>
            <th style='border: 1px solid black; background-color: lightgray;'>更新日</th>
        </tr>";

    while ($row = $result -> fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black;'>".$row["id"]."</td>";
        echo "<td style='border: 1px solid black;'>".$row["lastName"]."</td>";
        echo "<td style='border: 1px solid black;'>".$row["firstName"]."</td>";
        echo "<td style='border: 1px solid black;'>".$row["birthday"]."</td>";
        echo "<td style='border: 1px solid black;'>".$row["createdDay"]."</td>";
        echo "<td style='border: 1px solid black;'>".$row["updatedDay"]."</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
} else {
  	echo "No Data";
}

// MySQL 연결 종료
$conn -> close();
?>

