<?php
$servername = "localhost";  
$username = "root";  
$password = "root";   
$dbname = "pp01"; 

$id = $_GET['id'];
$data1 = $_POST['ULN'];
$data2 = $_POST['UFN'];
$data3 = $_POST['UBD'];
$data4 = $_POST['UCD'];
$data5 = $_POST['UUD'];
var_dump($_GET, $_POST);
exit;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("MySQL connection failed: " . $conn->connect_error);
}

// 데이터 갱신 쿼리 작성
$sql = "UPDATE content 
        SET lastName ='$data1', firstName ='$data2', birthday = '$data3', createdDay = '$data4', updatedDay = '$data5'
        WHERE id = '50'";

if ($conn->query($sql) == TRUE) {
    header("Location: index.php");
} else {
    echo "Updated failed: " . $conn->error;
}

$conn->close();
?>
