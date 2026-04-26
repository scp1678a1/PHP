<html>
<head>
    <title>使用者管理</title>
</head>
<body>

<?php
    error_reporting(0);               // 關閉錯誤訊息
    session_start();                  // 啟動 session

    if (!$_SESSION["id"]) {      // 檢查是否已登入
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        echo "<h1>使用者管理</h1>";
        echo "[<a href=14.user_add_form.php>新增使用者</a>] ";
        echo "[<a href=11.bulletin.php>回佈告欄列表</a>]<br><br>";

        $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");          // 連線資料庫

        $result = mysqli_query($conn, "select * from user");          // 取出所有使用者資料

        echo "<table border=1>";          // 顯示使用者表格
        echo "<tr><td>操作</td><td>帳號</td><td>密碼</td></tr>";

        while ($row = mysqli_fetch_array($result)) {           // 一筆一筆顯示使用者
            echo "<tr>";
            echo "<td><a href=19.user_edit_form.php?id={$row['id']}>修改</a> || ";
            echo "<a href=17.user_delete.php?id={$row['id']}>刪除</a></td>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['pwd']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
?>

</body>
</html>