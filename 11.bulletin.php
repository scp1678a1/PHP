<?php
    error_reporting(0);                    // 關閉錯誤訊息顯示
    session_start();                       // 啟動 session

    if (!$_SESSION["id"]) {    // 檢查是否已經登入
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {

        echo "歡迎, " . $_SESSION["id"] .         // 顯示歡迎訊息和功能連結
             " [<a href=12.logout.php>登出</a>] " .
             " [<a href=18.user.php>管理使用者</a>] " .
             " [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";

        $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");        // 連線資料庫

        $result = mysqli_query($conn, "select * from bulletin");        // 取出所有佈告資料

        echo "<table border=2>";        // 顯示佈告表格
        echo "<tr><td>操作</td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";

        while ($row = mysqli_fetch_array($result)) {        // 一筆一筆顯示佈告
            echo "<tr>";
            echo "<td><a href=26.bulletin_edit_form.php?bid={$row['bid']}>修改</a> ";
            echo "<a href=28.bulletin_delete.php?bid={$row['bid']}>刪除</a></td>";
            echo "<td>" . $row["bid"] . "</td>";
            echo "<td>" . $row["type"] . "</td>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td>" . $row["content"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
?>