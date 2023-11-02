<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href = "style.css">
    <title>一覧</title>
</head>
<body>
        <div class="menu">
            <a href="index.php">顧客管理</a>
        </div>

        <div class="upper"></div>
        
        <div class="left-divider"></div>

        <div class = 'parent'>

            <div class='first'>姓<br>
                <input type = 'text' name='first_name'>
            </div>
            <div class = 'second'>名<br>
                <input type = 'text' name='last_name'>
            </div>
            <div class = 'third'>生年月日<br>
                <input type = 'text' name='birthday'>
            </div>
            <div class = 'fourth'>作成日<br>
                <input type = 'text' name='created_day'>
            </div>
            <div class = 'fifth'>更新日<br>
                <input type = 'text' name='updated_day'>
            </div>
        </div>

        <div class = 'btn-container'>
            <button type="submit">登録</button>
        </div>

    <?
    include_once "sql.php";
    ?>
</body>
</html>