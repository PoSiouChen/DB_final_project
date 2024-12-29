<?php
include('db_connect.php');

// 初始化變數
$search_course_id = "";
$search_course_name = "";
$search_dept_name = "";
$sql = "";
$result = null;

// 處理課號查詢
if (isset($_POST['search_by_course_id']) && !empty($_POST['course_ID'])) {
    $search_course_id = $conn->real_escape_string($_POST['course_ID']);
    $sql = "SELECT course_ID, course_name, dept_name FROM course WHERE course_ID = '$search_course_id'";
}

// 處理課名查詢
if (isset($_POST['search_by_course_name']) && !empty($_POST['course_name'])) {
    $search_course_name = $conn->real_escape_string($_POST['course_name']);
    $sql = "SELECT course_ID, course_name, dept_name FROM course WHERE course_name LIKE '%$search_course_name%'";
}

// 處理開課系所查詢
if (isset($_POST['search_by_dept_name']) && !empty($_POST['dept_name'])) {
    $search_dept_name = $conn->real_escape_string($_POST['dept_name']);
    $sql = "SELECT course_ID, course_name, dept_name FROM course WHERE dept_name = '$search_dept_name'";
}

// 執行查詢
if (!empty($sql)) {
    $result = $conn->query($sql);
    // 清空查詢變數
    $search_course_id = "";
    $search_course_name = "";
    $search_dept_name = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            margin-top: 20px;
            color: #333;
        }
        form {
            display: inline-block;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            margin-right: 10px;
        }
        input, select {
            padding: 5px 10px;
            margin-bottom: 10px;
            width: 250px;
        }
        button {
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        p {
            color: #555;
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link" href="count.php">計算學分</a></li>
                    <li class="nav-item"><a class="nav-link" href="graduation.php">畢業門檻</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <!-- <a class="btn-getstarted" href="login.php">登入系統</a> -->
        </div>
    </header>

    <section class="hero">
    <div >
    <h1>課程查詢系統</h1>
    <form method="post" action="">
        <label for="course_ID">課號:</label>
        <input type="text" id="course_ID" name="course_ID" value="<?php echo htmlspecialchars($search_course_id); ?>">
        <button type="submit" name="search_by_course_id">查詢課號</button>
        <br><br>

        <label for="course_name">課名:</label>
        <input type="text" id="course_name" name="course_name" value="<?php echo htmlspecialchars($search_course_name); ?>">
        <button type="submit" name="search_by_course_name">查詢課名</button>
        <br><br>

        <label for="dept_name">開課系所:</label>
        <select id="dept_name" name="dept_name">
            <option value="">-- 請選擇系所 --</option>
            <option value="生命科學暨生物科技學系">生命科學暨生物科技學系</option>
            <option value="海洋生物科技學士學位學程">海洋生物科技學士學位學程</option>
            <option value="海洋科學與資源學院">海洋科學與資源學院</option>
            <option value="環境生物與漁業科學學系">環境生物與漁業科學學系</option>
            <option value="海洋環境資訊系">海洋環境資訊系</option>
            <option value="機械與機電工程學系">機械與機電工程學系</option>
            <option value="系統工程暨造船學系">系統工程暨造船學系</option>
            <option value="河海工程學系">河海工程學系</option>
            <option value="海洋工程科技學士學位學程">海洋工程科技學士學位學程</option>
            <option value="電機工程學系">電機工程學系</option>
            <option value="資訊工程學系">資訊工程學系</option>
            <option value="通訊與導航工程學系">通訊與導航工程學系</option>
            <option value="光電與材料科技學系">光電與材料科技學系</option>
            <option value="海洋文創設計產業學士學位學程">海洋文創設計產業學士學位學程</option>
            <option value="海洋觀光管理學士學位學程">海洋觀光管理學士學位學程</option>
            <option value="海洋法政學士學位學程">海洋法政學士學位學程</option>
            <option value="共同教育中心語文教育組">共同教育中心語文教育組</option>
            <option value="大學部英語課程(原外語中心)">大學部英語課程(原外語中心)</option>
            <option value="共同教育中心博雅教育組">共同教育中心博雅教育組</option>
            <option value="華語中心">華語中心</option>
            <option value="體育室">體育室</option>
            <option value="軍訓室">軍訓室</option>
            <option value="校際選課（臺北聯合大學系統）">校際選課（臺北聯合大學系統）</option>
        </select>
        <button type="submit" name="search_by_dept_name">查詢系所</button>
        
    </form>
    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr>
                <th>課號</th>
                <th>課名</th>
                <th>開課系所</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['course_ID']); ?></td>
                    <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['dept_name']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <p>無符合的資料。</p>
    <?php endif; ?>
    <br><br><br><br><br><br><br>
    <div>
    </section>
</body>
</html>
