<?php
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "pp01";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
    die("MySQL connection failed: " . $conn -> connect_error);
}

// 텍스트 입력란에서 전달된 데이터 가져오기
$last_name = $_POST["last_name"];
$first_name = $_POST["first_name"];
$birthday = $_POST["birthday"];
$created_day = $_POST["created_day"];
$updated_day = $_POST["updated_day"];

// 데이터 삽입 쿼리
$insert_sql = "INSERT INTO content (lastName, firstName, birthday, createdDay, updatedDay) 
VALUES ('$last_name', '$first_name', '$birthday', '$created_day', '$updated_day')";
$conn->query($insert_sql);
$id = mysqli_insert_id($conn);
$conn -> close();

header("Location: edit_page.php?id=".$id);
?>
