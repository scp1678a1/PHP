<html>
    <head><title>明新科技大學資訊管理系</title>
    <meta charset="utf-8">
    <link href="https://cdn.bootcss.com/flexslider/2.6.3/flexslider.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/flexslider/2.6.3/jquery.flexslider-min.js"></script>
    
    <script>
        // 頁面載入完成後初始化輪播圖
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                rtl: true
            });
        });
    </script>
    
    <style>
        /* 全域樣式 */
        *{
            margin:0;
            color:gray;
            text-align:center;
        }
        
        /* 頂部標頭 */
        .top{
             background-color: white;
        }
        .top .container{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding:10px;
        }
        .top .logo{
            font-size: 35px;
            font-weight: bold;
        }
        .top .logo img{
            width: 100px;
            vertical-align: middle;
        }
        .top .top-nav{
            font-size: 25px;
            font-weight: bold;
        }
        .top .top-nav a{
            text-decoration: none;
        }

        /* 導覽列 */
        .nav {
            background-color:#333;
            display: flex;
            justify-content: center;
        }
        /* 下拉式選單樣式 */
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
        }

        /* 輪播圖 */
        .slider{
            background-color: black;
        }

        /* 系所簡介區 */
        .banner{
            background-image: linear-gradient(#ABDCFF,#0396FF);
            padding:30px;
        }

        /* 師資介紹 */
        .faculty {
            display: block;
            justify-content: center;
            background-color:white;
            padding:40px;
        }

        /* 聯絡資訊 */
        .contact {
            display: block;
            justify-content: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        /* 佈告欄 */
        .bulletin{
            display: block;
            justify-content: center;
            background-color: rgb(255,204,153);
            padding: 30px 0;
        }
        .bulletin table{
            border-collapse:collapse;
            font-family: 微軟正黑體;
            font-size:16px;
            border:1px solid #000;
        }
    </style>
    </head>
    <body>
        <!-- 頂部標頭 -->
        <div class="top">
            <div class="container">
                <div class="logo">
                  <img src="https://github.com/shhuangmust/html/raw/111-1/IMMUST_LOGO.JPG">
                  明新科技大學資訊管理系
                </div>
                <div class="top-nav">
                  <a href=>明新科大</a>
                  <a href=>明新管理學院</a>
                  <!-- 登入按鈕 -->
                  <label onclick="document.getElementById('login').style.display='block'">登入</label>
                  
                  <!-- 登入彈窗 -->
                  <div id="login" class="modal">
                    <span onclick="document.getElementById('login').style.display='none'">&times; 管理系統登入</span>
                    <form method=post action="10.login.php">
                        帳號：<input type=text name="id"><br />
                        密碼：<input type=password name="pwd"><p></p>
                        <input type=submit value="登入"> <input type=reset value="清除">
                    </form>
                  </div>
                </div>
            </div>
        </div>

        <!-- 主要導覽列 -->
        <div class="nav">
            <ul>
                <li><a href="#home">首頁</a></li>
                <li><a href="#introduction">系所簡介</a></li>
                <li class="dropdown"><a href="#faculty">成員簡介</a>
                    <div class="dropdown-content">
                        <a href="#faculty">黃老師</a>
                        <a href="#faculty">李老師</a>
                        <a href="#faculty">應老師</a>
                    </div>
                </li>
                <li><a href="#about">相關資訊</a></li>
            </ul>
        </div>

        <!-- 輪播圖區 -->
        <div class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider1.JPG" /></li>
                    <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider2.JPG" /></li>
                    <li><img src="https://github.com/shhuangmust/html/raw/111-1/slider3.JPG" /></li>
                </ul>
            </div>
        </div>

        <!-- 最新公告佈告欄 -->
        <div class="bulletin">
           <h1>最新公告</h1>
            <?php
                // 建立資料庫連線
                $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
                
                // 查詢所有佈告
                $result = mysqli_query($conn, "select * from bulletin");
                
                // 輸出佈告表格
                echo "<table border=2><tr><th>佈告編號</th><th>佈告類別</th><th>標題</th><th>佈告內容</th><th>發佈時間</th></tr>";
                while ($row = mysqli_fetch_array($result)){
                    echo "<tr><td>" . $row["bid"] . "</td><td>";
                    if ($row["type"] == 1) echo "系上公告";
                    if ($row["type"] == 2) echo "獲獎資訊";
                    if ($row["type"] == 3) echo "徵才資訊";
                    echo "</td><td>" . $row["title"] . "</td><td>" . $row["content"] . "</td><td>" . $row["time"] . "</td></tr>";
                }
                echo "</table>";
            ?>
        </div>

        <!-- 系所簡介 -->
        <div class="banner" id="introduction">
            <h1>系所簡介</h1>
            <h1>歷年教育部評鑑皆榮獲一等</h1>
            <h1>明新科技大學資訊管理系</h1>
            <h1>全國私立科大第一資管系</h1>
        </div>

        <!-- 師資介紹 -->
        <div class="faculty" id="faculty">
            <h2>師資介紹</h2>
            <div class="container">
                <a class="teacher" href="">
                    <img src="https://github.com/shhuangmust/html/raw/111-1/faculty1.jpg" />
                    <h3>黃老師</h3>
                </a>
                <a class="teacher" href="">
                    <img src="https://github.com/shhuangmust/html/raw/111-1/faculty2.jpg" />
                    <h3>李老師</h3>
                </a>
                <a class="teacher" href="">
                    <img src="https://github.com/shhuangmust/html/raw/111-1/faculty3.jpg" />
                    <h3>應老師</h3>
                </a>
            </div>
        </div>

        <!-- 聯絡資訊 -->
        <div class="contact" id="about">
            <h2>相關資訊</h2>
            <div class="infos">
                <div class="left">
                    <b>明新科技大學管理學院大樓二樓</b>
                    <span>304新竹縣新豐鄉新興路1號</span>
                    <b> 電話:03-5593142</b>
                    <span>分機:3431、3432、3433</span>
                    <b> 傳真:03-5593142</b>
                    <span>分機:3440</span>
                </div>
                <div class="right">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3044.185885150929!2d120.98912333466727!3d24.86332844316392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34683154faa8283b%3A0x92cb1c5564a574ef!2z5piO5paw56eR5oqA5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1536665837954" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- 頁尾 -->
        <div class="footer">
            &copy;Copyright 2022 Department of Information Management, MUST. All rights reserved. 維護者 Tony SHHuang
        </div>
     </body>
</html>