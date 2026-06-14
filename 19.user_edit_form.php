<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
        // 關閉錯誤訊息顯示
        error_reporting(0);
        
        // 啟動 Session
        session_start();
        
        // 檢查是否已登入
        if (!$_SESSION["id"]) {
            echo "請登入帳號";
            // 3秒後自動跳轉到登入頁
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        }
        else{
            // 建立資料庫連線
            $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
            
            // 查詢要修改的使用者資料
            $result = mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
            $row = mysqli_fetch_array($result);
            
            // 顯示修改表單
            echo "
            <form method=post action=20.user_edit.php>
                <input type=hidden name=id value={$row['id']}>
                帳號：{$row['id']}<br>
                密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
                <input type=submit value=修改>
            </form>
            ";
        }
    ?>
    </body>
</html>