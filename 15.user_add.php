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
        
        // 準備新增使用者的 SQL 指令
        $sql = "insert into user(id, pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
        
        // echo $sql;   // 除錯用：顯示 SQL 語句
        
        // 執行 SQL 新增資料
        if (!mysqli_query($conn, $sql)) {
            echo "新增命令錯誤";
        }
        else{
            echo "新增使用者成功，三秒鐘後回到網頁";
            // 3秒後自動跳轉到使用者列表頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }
?>