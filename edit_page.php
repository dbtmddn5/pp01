<?php

//データーベースへのアクセス情報
$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "pp01";

//データーベースへの接続
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
    die("MySQL connection failed: " . $conn -> connect_error);
}

//getパラメーターの取得
$target_data_id = $_GET["id"];

//データーベースへの特定の情報の引用
$select_sql = "SELECT * FROM content where id = $target_data_id";
$result = $conn -> query($select_sql);
$conn -> close();


// データを変数に格納
if ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $LN = $row['lastName'];
    $FN = $row['firstName'];
    $BD = $row['birthday'];
    $CD = $row['createdDay'];
    $UD = $row['updatedDay'];
}

//var_dump($LN);


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href = "style.css">
    <title>一覧</title>
</head>
<style>
</style>
<body>

        <div class="menu">
            <a href="index.php">顧客管理</a>
        </div>

        <div class="upper"></div>
        
        <div class="left-divider"></div>

        <form action = 'update_process.php' method = 'post'>
                <div style='display: flex; justify-content: center;'>
                <table style='margin: 100px auto; border-collapse: collapse;'>
                
                <tr>
                    <th style='border: 1px solid black; background-color: lightgray;'>ID</th>
                    <td style='border: 1px solid black;'><input type = 'hidden' name = 'UID' value = '<?php echo $id ?>'><?php echo $id ?></td>
                </tr>

                <tr>
                    <th style='border: 1px solid black; background-color: lightgray;'>姓</th>
                    <td style='border: 1px solid black;'><input type = 'text' name = 'ULN' value = '<?php echo $LN ?>'></td>
                </tr>

                <tr>
                    <th style='border: 1px solid black; background-color: lightgray;'>名</th>
                    <td style='border: 1px solid black;'><input type = 'text' name = 'UFN' value = '<?php echo $FN ?>'></td>
                </tr>

                <tr>
                    <th style='border: 1px solid black; background-color: lightgray;'>生年月日</th>
                    <td style='border: 1px solid black;'><input type = 'text' name = 'UBD' value = '<?php echo $BD ?>'></td>
                </tr>

                <tr>
                    <th style='border: 1px solid black; background-color: lightgray;'>作成日</th>
                    <td style='border: 1px solid black;'><input type = 'text' name = 'UCD' value = '<?php echo $CD ?>'</td>
                </tr>

                <tr>
                    <th style='border: 1px solid black; background-color: lightgray;'>更新日</th>
                    <td style='border: 1px solid black;'><input type = 'text' name = 'UUD' value = '<?php echo $UD ?>'></td>
                </tr>
                </table>

            <br>
    
            <!-- 更新ボタンの実装 -->
            <input type = "submit" value = "更新" 
            style = "
            width: 200px;
            margin: auto;
            background-color: green;
            color: white;
            border-radius: 5px;
            border-color: black;
            ">
            
            
            <a href = "delete_process.php?UID=<?php echo $id ?>">削除</a>
        </form>
</body>
</html>