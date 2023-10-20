<?php
// 데이터베이스 연결 설정
$servername = "localhost";  
$username = "root";    
$password = "";     
$dbname = "pp01";  

// MySQL에 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 오류 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 등록된 데이터 조회하기
$sql_select = "SELECT * FROM content";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    echo "<div style='display: flex; justify-content: center;'>";
    echo "<table style='margin: 100px auto; border-collapse: collapse;'>";
    echo "<tr>
            <th style='border: 1px solid black;'>姓</th>
            <th style='border: 1px solid black;'>名</th>
            <th style='border: 1px solid black;'>生年月日</th>
            <th style='border: 1px solid black;'>作成日</th>
            <th style='border: 1px solid black;'>更新日</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black;'>".$row["last_name"]."</td>";
        echo "<td style='border: 1px solid black;'>".$row["first_name"]."</td>";
        echo "<td style='border: 1px solid black;'>".$row["birthday"]."</td>";
        echo "<td style='border: 1px solid black;'>".$row["created_day"]."</td>";
        echo "<td style='border: 1px solid black;'>".$row["updated_day"]."</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
} else {
  	echo "No Data";
}

// MySQL 연결 종료
$conn->close();
?>

