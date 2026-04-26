<?php
    session_start();                    // 啟動 session

    unset($_SESSION["id"]);             // 清除登入的帳號資訊

    echo "登出成功....";               // 顯示登出成功訊息

    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";       // 3秒後自動跳回登入頁面
?>