<?php
session_start();
include('db_connect.php'); // 資料庫連接檔案

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_ID = $_POST['student_ID'];

    // 檢查學生是否存在
    $check_query = "SELECT * FROM student WHERE student_ID = '$student_ID'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // 註冊過的學生，建立 session
        $_SESSION['student_ID'] = $student_ID;
        header("Location: courseTaken.php"); // 重定向到課程頁面
        exit();
    } else {
        $error_message = "未註冊過!";
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="homePage.php" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">NTOU CSE</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li class="nav-item"><a class="nav-link" href="search.php">課程查詢</a></li>
                    <li class="nav-item"><a class="nav-link" href="courseTaken.php">學生已修課列表</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">計算學分</a></li>
                    <li class="nav-item"><a class="nav-link" href="graduation.php">畢業門檻</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <!-- <a class="btn-getstarted" href="login.php">登入系統</a> -->
        </div>
    </header>

    <section class="hero">
        <div class="container my-auto">
            <div class="row justify-content-center">
                <div class="col-md-6 card shadow border-0">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4 text-primary">登入</h2>
                        
                        <?php if (!empty($error_message)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="login.php">
                            <div class="mb-3">
                                <label for="student_ID" class="form-label">學號</label>
                                <input type="text" id="student_ID" name="student_ID" class="form-control" placeholder="請輸入學號" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">登入</button>
                            </div>
                        </form>
                        
                        <p class="text-center mt-3">尚未註冊？ <a href="register.php" class="text-decoration-none text-primary">去註冊</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
