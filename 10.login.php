<?php
   $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");     // 連線到資料庫

   $result = mysqli_query($conn, "select * from user");     // 從 user 資料表取出所有帳號密碼

   $login = FALSE;      // 預設登入失敗

   while ($row = mysqli_fetch_array($result)) {      // 一筆一筆檢查帳號密碼是否正確
       if ($_POST["id"] == $row["id"] && $_POST["pwd"] == $row["pwd"]) {
           $login = TRUE;
       }
   }
   
   if ($login == TRUE) {    // 判斷登入結果
       session_start();                    // 開啟 session 功能
       $_SESSION["id"] = $_POST["id"];     // 記住目前登入的帳號
       
       echo "登入成功<br>";
       echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";  // 3秒後跳轉
   } 
   else {
       echo "帳號或密碼錯誤<br>";
       echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";     // 3秒後回到登入頁
   }
?>