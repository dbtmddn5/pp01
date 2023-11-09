<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href = "style.css">
    <title>一覧</title>
</head>
<style>
    input[type=submit] {
        width: 300px;
        margin: auto;
        background-color: blue;
        color: white;
        border-radius: 5px;
    }
</style>
<body>
    <form action = "save_data.php" method = "post">
        <div class="menu">
            <a href="index.php">顧客管理</a>
        </div>

        <div class="upper"></div>
        
        <div class="left-divider"></div>

        <div class = 'parent'>

            <div class='first'>姓<br>
                <input type = 'text' id='userLN' name='last_name'>
            </div>
            <div class = 'second'>名<br>
                <input type = 'text' id='userFN' name='first_name'>
            </div>
            <div class = 'third'>生年月日<br>
                <input type = 'text' id='userBD' name='birthday'>
            </div>
            <div class = 'fourth'>作成日<br>
                <input type = 'text' id='userCD' name='created_day'>
            </div>
            <div class = 'fifth'>更新日<br>
                <input type = 'text' id='userUD' name='updated_day'>
            </div>
        </div>

        <div class = 'btn-container'>
            <input type = "submit" value = "登録">
        </div>
    </form>

    <?php
    include_once "sql.php";
    ?>
</body>
</html>