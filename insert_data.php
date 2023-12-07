<?php
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "pp01";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
    die("MySQL connection failed: " . $conn -> connect_error);
}

// テキスト入力欄から来たデータ持ってくる
$last_name = $_POST["last_name"];
$first_name = $_POST["first_name"];
$birthday = $_POST["birthday"];
$created_day = $_POST["created_day"];
$updated_day = $_POST["updated_day"];

// データ追加
$insert_sql = "INSERT INTO content (lastName, firstName, birthday, createdDay, updatedDay) 
VALUES ('$last_name', '$first_name', '$birthday', '$created_day', '$updated_day')";
$conn->query($insert_sql);
$id = mysqli_insert_id($conn);
$conn -> close();

header("Location: edit_page.php?id=".$id);
?>
