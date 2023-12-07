<?php
//データーベースのアクセス情報
$servername = "localhost";  
$username = "root";  
$password = "root";   
$dbname = "pp01"; 

//修正したデータを変数に代入
$data0 = $_POST['UID'];
$data1 = $_POST['ULN'];
$data2 = $_POST['UFN'];
$data3 = $_POST['UBD'];
$data4 = $_POST['UCD'];
$data5 = $_POST['UUD'];

$conn = new mysqli($servername, $username, $password, $dbname);

//データーベースのエラ処理
if ($conn->connect_error) {
    die("MySQL connection failed: " . $conn->connect_error);
}

//データーベースの更新query
$sql = "UPDATE content 
        SET lastName ='$data1', firstName ='$data2', birthday = '$data3', createdDay = '$data4', updatedDay = '$data5'
        WHERE id = '$data0'";

//更新に成功したら、index.phpへ移動
if ($conn->query($sql) == TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "Updated failed: " . $conn->error;
}

//データーベースへの接続終了
$conn->close();
?>