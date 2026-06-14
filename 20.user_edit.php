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
        
        // 執行更新密碼的 SQL 指令
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")) {
            echo "修改錯誤";
            // 修改失敗，跳轉回使用者列表
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        } else {
            echo "修改成功，三秒鐘後回到網頁";
            // 修改成功，跳轉回使用者列表
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }
?>