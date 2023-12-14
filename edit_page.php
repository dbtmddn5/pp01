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


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href = "style.css">
    <title>一覧</title>
</head>
<script>
    function call_confirm() {
        var rtn;
        rtn = confirm("本当に削除しますか?");
        if(rtn) {
            document.getElementById('frm').submit();
        }else{
            return false;
        }
    }
</script>
<style>
    .center-table {
        display: flex;
        justify-content: center;
    }
</style>
<body>

        <div class="menu">
            <a href="index.php">顧客管理</a>
        </div>

        <div class="left-divider"></div>

        <form action = 'update_process.php' method = 'post'>
                <div style='justify-content: center;'>
                <table style='margin: auto; border-collapse: collapse;'>
                
                <tr>
                    <th style='border: 1px solid black; background-color: lightgray;'>ID</th>
                    <td style='border: 1px solid black;'>
                        <input type = 'hidden' name = 'UID' value = '<?php echo $id ?>'>
                        <?php echo $id ?>
                    </td>
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
                    <td style='border: 1px solid black;'><input type = 'date' name = 'UBD' value = '<?php echo $BD ?>'></td>
                </tr>

                <tr>
                    <th style='border: 1px solid black; background-color: lightgray;'>作成日</th>
                    <td style='border: 1px solid black;'><input type = 'date' name = 'UCD' value = '<?php echo $CD ?>'</td>
                </tr>

                <tr>
                    <th style='border: 1px solid black; background-color: lightgray;'>更新日</th>
                    <td style='border: 1px solid black;'><input type = 'date' name = 'UUD' value = '<?php echo $UD ?>'></td>
                </tr>
                </table>

            
    
            <!-- 更新ボタンの実装 -->
            <input type = "submit" value = "更新"
            style = "
            width: 200px;
            margin-top: 30px;
            margin-left: 500px;
            background-color: green;
            color: white;
            border-radius: 5px;
            border-color: black;
            float: left;
            ">
        </form>


        <form name = 'frm' action = 'delete_process.php' method = 'post' onsubmit="return confirm('本当に削除しますか？')">
                <input type = 'hidden' name = 'UID' value = '<?php echo $id ?>'>
                <!-- 更新ボタンの実装 -->
                <input type = "submit" value = "削除" 
                style = "
                width: 200px;
                margin-top: 30px;
                background-color: red;
                color: white;
                border-radius: 5px;
                border-color: black;
                ">
        </form>
</body>
</html>