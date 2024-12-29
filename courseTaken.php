<?php
session_start();
include('db_connect.php'); // 引入資料庫連接檔案

if (!isset($_SESSION['student_ID'])) {
    header("Location: login.php"); // 如果未登入，重定向到登入頁面
    exit();
}

$student_ID = $_SESSION['student_ID'];

// 查詢學生姓名
$student_name_query = "SELECT name FROM student WHERE student_ID = '$student_ID'";
$student_name_result = mysqli_query($conn, $student_name_query);

if ($student_name_result && mysqli_num_rows($student_name_result) > 0) {
    $student_name = mysqli_fetch_assoc($student_name_result)['name'];
} else {
    $student_name = "不知道你是誰";
}

// 顯示學生已修過的課程
$query = "SELECT c.course_ID, c.course_name, c.dept_name 
          FROM my_course mc
          JOIN course c ON mc.course_ID = c.course_ID
          WHERE mc.student_ID = '$student_ID'";

$result = mysqli_query($conn, $query);

// 判斷按鈕選擇
$action = isset($_POST['action']) ? $_POST['action'] : 'add'; // 預設顯示新增課程的輸入框

// 處理登出
if (isset($_POST['logout'])) {
    session_unset(); // 清除所有session變數
    session_destroy(); // 銷毀session
    header("Location: homePage.php"); // 重定向回首頁
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生已修課列表</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<!-- 頁面主選單 -->
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
    </div>
</header>

<section class="hero">
<div class="container">
    <!-- 學生名稱與登出按鈕 -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">學生: <?php echo $student_ID; ?> <?php echo $student_name; ?></h3>
        <form method="POST">
            <button type="submit" name="logout" class="btn btn-danger">登出</button>
        </form>
    </div>

    <!-- 按鈕選擇新增、刪除、修改 -->
    <form method="POST" class="mb-4">
        <div class="btn-group" role="group">
            <button type="submit" name="action" value="add" class="btn btn-primary <?php echo ($action == 'add') ? 'active' : ''; ?>">新增課程</button>
            <button type="submit" name="action" value="delete" class="btn btn-primary <?php echo ($action == 'delete') ? 'active' : ''; ?>">刪除課程</button>
            <button type="submit" name="action" value="modify" class="btn btn-primary <?php echo ($action == 'modify') ? 'active' : ''; ?>">修改課程</button>
        </div>
    </form>



    <?php
    // 根據按鈕選擇顯示對應的輸入框
    if ($action == 'add') {
        echo '<div class="card mt-4">
            <div class="card-header">
                批量新增課程
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="course_ID" class="form-label">課號 (多個課程用逗號分隔):</label>
                        <input type="text" name="course_ID" class="form-control" placeholder="請輸入課號，例如: B01022H0,C02033A" required>
                    </div>
                    <button type="submit" name="action" value="add" class="btn btn-success">新增</button>
                </form>
            </div>
        </div>';
    } elseif ($action == 'delete') {
        echo '<div class="card mt-4">
                <div class="card-header">
                    刪除課程
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="course_ID" class="form-label">課號:</label>
                            <input type="text" name="course_ID" class="form-control" placeholder="請輸入要刪除的課號" required>
                        </div>
                        <button type="submit" name="action" value="delete" class="btn btn-danger">刪除</button>
                    </form>
                </div>
            </div>';
    } elseif ($action == 'modify') {
        echo '<div class="card mt-4">
                <div class="card-header">
                    修改課程
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="old_course_ID" class="form-label">原課號:</label>
                            <input type="text" name="old_course_ID" class="form-control" placeholder="請輸入原課號" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_course_ID" class="form-label">新課號:</label>
                            <input type="text" name="new_course_ID" class="form-control" placeholder="請輸入新課號" required>
                        </div>
                        <button type="submit" name="action" value="modify" class="btn btn-warning">修改</button>
                    </form>
                </div>
            </div>';
    }
  
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 新增課程
        if ($action == 'add' && isset($_POST['course_ID'])) {
            $course_IDs = explode(',', $_POST['course_ID']); // 接收課程 ID 並分割成陣列
        
            foreach ($course_IDs as $course_ID) {
                $course_ID = trim($course_ID);
        
                // 檢查是否已存在記錄
                $check_query = "SELECT * FROM my_course WHERE student_ID = '$student_ID' AND course_ID = '$course_ID'";
                $check_result = mysqli_query($conn, $check_query);
        
                if (mysqli_num_rows($check_result) == 0) {
                    // 調用儲存過程，新增記錄
                    $call_query = "CALL add_multiple_courses('$student_ID', '$course_ID')";
                    if (mysqli_query($conn, $call_query)) {
                        echo "<div class='alert alert-success mt-3'>成功新增課程：$course_ID</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>新增課程失敗：$course_ID</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning mt-3'>課程已存在：$course_ID</div>";
                }
            }
        }  
        
    
        // 刪除課程
        if ($action == 'delete' && isset($_POST['course_ID'])) {
            $course_ID = $_POST['course_ID'];
    
            // 檢查該學生是否已選擇此課程
            $check_query = "SELECT * FROM my_course WHERE student_ID = '$student_ID' AND course_ID = '$course_ID'";
            $check_result = mysqli_query($conn, $check_query);
    
            if (mysqli_num_rows($check_result) == 0) {
                // 如果沒有結果，表示該學生沒有這門課
                echo "<div class='alert alert-warning mt-3'>學生沒有此課程!</div>";
            } else {
                // 若有結果，執行刪除
                $delete_query = "DELETE FROM my_course WHERE student_ID = '$student_ID' AND course_ID = '$course_ID'";
                if (mysqli_query($conn, $delete_query)) {
                    echo "<div class='alert alert-success mt-3'>課程刪除成功!</div>";
                } else {
                    echo "<div class='alert alert-danger mt-3'>刪除課程失敗: " . mysqli_error($conn) . "</div>";
                }
            }
        }
    
        // 修改課程
        if ($action == 'modify' && isset($_POST['old_course_ID']) && isset($_POST['new_course_ID'])) {
            $old_course_ID = $_POST['old_course_ID'];
            $new_course_ID = $_POST['new_course_ID'];
    
            // 檢查原課程是否存在於學生的課程清單中
            $check_old_course_query = "SELECT * FROM my_course WHERE student_ID = '$student_ID' AND course_ID = '$old_course_ID'";
            $check_old_course_result = mysqli_query($conn, $check_old_course_query);
    
            if (mysqli_num_rows($check_old_course_result) == 0) {
                // 如果原課程不在學生的清單中
                echo "<div class='alert alert-warning mt-3'>學生沒有選擇此課程!</div>";
            } else {
                // 檢查新課程是否存在
                $course_query = "SELECT * FROM course WHERE course_ID = '$new_course_ID'";
                $course_result = mysqli_query($conn, $course_query);
    
                if (mysqli_num_rows($course_result) > 0) {
                    // 更新課程
                    $update_query = "UPDATE my_course SET course_ID = '$new_course_ID' WHERE student_ID = '$student_ID' AND course_ID = '$old_course_ID'";
                    if (mysqli_query($conn, $update_query)) {
                        echo "<div class='alert alert-success mt-3'>課程修改成功!</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>修改課程失敗: " . mysqli_error($conn) . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning mt-3'>新課程不存在!</div>";
                }
            }
        }
    
        // 重新查詢最新課程列表
        $query = "SELECT c.course_ID, c.course_name, c.dept_name 
                  FROM my_course mc
                  JOIN course c ON mc.course_ID = c.course_ID
                  WHERE mc.student_ID = '$student_ID'";
        $result = mysqli_query($conn, $query);
    }
    
    ?>
    <br><hr>
    <h3 class="mt-5">已修課程列表:</h3>
    <table class="table table-bordered shadow rounded">
        <thead class="table-secondary">
            <tr>
                <th>課號</th>
                <th>課名</th>
                <th>開課系所</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row['course_ID'] . "</td>
                        <td>" . $row['course_name'] . "</td>
                        <td>" . $row['dept_name'] . "</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

</div>
</section>

<!-- 引入 Bootstrap 和 jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
