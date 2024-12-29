<?php
session_start(); // 啟動 session，方便管理登入狀態
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="index-page">

<!-- Menu -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="homePage.php" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">NTOU CSE</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li class="nav-item"><a class="nav-link" href="search.php">課程查詢</a></li>
                <li class="nav-item"><a class="nav-link" href="courseTaken.php">學生已修課列表</a></li>
                <li class="nav-item"><a class="nav-link" href="count.php">計算學分</a></li>
                <li class="nav-item"><a class="nav-link" href="graduation.php">畢業門檻</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <!-- <a class="btn-getstarted" href="login.php">登入系統</a> -->
        

    </div>
</header>

<!-- 首頁內容 -->
<section class="hero">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
            <!-- 文字內容 -->
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <h1 class="mb-4">
                        延畢檢測站 <br>
                        <span class="accent-text">NTOU CSE 畢業檢測</span>
                    </h1>
                    <p class="mb-4 mb-md-5">
                        畢業將至，但我們需要透過繁雜的判斷才能確定自己是否達到畢業門檻，
                        有些人甚至到大四才發現有課沒修，未達畢業門檻。因此我們製作了一個系統
                        讓資工系學生能夠填寫自己的修課資料，幫助資工系的學生判斷自己是否達到畢業門檻。<br><br>
                        為簡化起見，本系統僅適用於111年入學的資工系學生，且游泳與英文畢業門檻、
                        服務學習不在檢測範圍內。
                    </p>
                    <div class="hero-buttons">
                        <a href="login.php" class="btn btn-primary">
                            <i class="bi bi-person me-1"></i>登入系統
                        </a>
                        <a href="register.php" class="btn btn-link">
                            <i class="bi bi-person-add me-1"></i>註冊
                        </a>
                    </div>
                </div>
            </div>

            <!-- 大門照 -->
            <div class="col-lg-6">
                <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                    <img src="img/ntou.png" alt="ntou Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 引入 Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
