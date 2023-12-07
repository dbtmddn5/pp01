<?php
//データーベースのアクセス情報
$servername = "localhost";  
$username = "root";  
$password = "root";   
$dbname = "pp01"; 

//修正したデータを変数に代入
$data0 = $_GET['UID'];
//var_dump($_GET);
//exit;

$conn = new mysqli($servername, $username, $password, $dbname);

//データーベースのエラ処理
if ($conn->connect_error) {
    die("MySQL connection failed: " . $conn->connect_error);
}

//データーベースの削除query
$sql = "DELETE FROM content 
        WHERE id = '$data0'";

//削除に成功したら、index.phpへ移動
if ($conn->query($sql) == TRUE) {
    header("Location: index.php");
    exit;
} else {
    echo "delete failed: " . $conn->error;
}

//データーベースへの接続終了
$conn->close();
?>