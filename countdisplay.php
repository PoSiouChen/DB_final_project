<!DOCTYPE html>
<html lang="en">
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
    <h3 class="mt-5">校訂必修課程清單</h3>
    <table class="table table-bordered shadow rounded">
        <thead class="table-secondary">
			<tr>
				<th>課程代碼</th>
				<th>課程名稱</th>
				<th>開課系所</th>
				<th>學分</th>
			</tr>
		</thead>
        <?php foreach ($data['chinese'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
            </tr>
        <?php endforeach; ?>
		<?php foreach ($data['junior_english'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
            </tr>
        <?php endforeach; ?>
        <?php foreach ($data['senior_english'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
            </tr>
        <?php endforeach; ?>
		<?php foreach ($data['school_general'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
	</table>
    <h3 class="mt-5">博雅課程清單</h3>
    <table class="table table-bordered shadow rounded">
        <thead class="table-secondary">
			<tr>
				<th>課程代碼</th>
				<th>課程名稱</th>
				<th>開課系所</th>
				<th>學分</th>
				<th>領域</th>
			</tr>
		</thead>
		<?php foreach ($data['general'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
				<td><?= $course['field'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h3 class="mt-5">資工必修課程清單</h3>
    <table class="table table-bordered shadow rounded">
        <thead class="table-secondary">
			<tr>
				<th>課程代碼</th>
				<th>課程名稱</th>
				<th>開課系所</th>
				<th>學分</th>
			</tr>
		</thead>
        <?php foreach ($data['required'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
	<h3 class="mt-5">資工選修課程清單</h3>
    <table class="table table-bordered shadow rounded">
        <thead class="table-secondary">
			<tr>
				<th>課程代碼</th>
				<th>課程名稱</th>
				<th>開課系所</th>
				<th>學分</th>
			</tr>
		</thead>
        <?php foreach ($data['elective'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h3 class="mt-5">體育課程清單</h3>
    <table class="table table-bordered shadow rounded">
        <thead class="table-secondary">
			<tr>
				<th>課程代碼</th>
				<th>課程名稱</th>
				<th>開課系所</th>
				<th>學分</th>
			</tr>
		</thead>
        <?php foreach ($data['sports'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
	<h3 class="mt-5">語言課程清單</h3>
    <table class="table table-bordered shadow rounded">
        <thead class="table-secondary">
			<tr>
				<th>課程代碼</th>
				<th>課程名稱</th>
				<th>開課系所</th>
				<th>學分</th>
			</tr>
		</thead>
        <?php foreach ($data['language'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
	<h3 class="mt-5">系外課程清單</h3>
    <table class="table table-bordered shadow rounded">
        <thead class="table-secondary">
			<tr>
				<th>課程代碼</th>
				<th>課程名稱</th>
				<th>開課系所</th>
				<th>學分</th>
			</tr>
		</thead>
        <?php foreach ($data['other'] as $course): ?>
            <tr>
                <td><?= $course['course_ID'] ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['dept_name'] ?></td>
                <td><?= $course['credit'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3 class="mt-5">畢業條件檢查結果</h3>
    <table  class="table table-bordered shadow rounded">
        <thead class="table-secondary">
			<tr>
				<th>課程</th>
				<th>有效畢業學分 (超過則等於學分上限)</th>
			</tr>
		</thead>
        <tr>
            <td>國文</td>
            <td><?= $data['total_chinese_credits'] ?></td>
        </tr>
        <tr>
            <td>英文</td>
            <td>
                <?= 
                    $data['total_junior_english_credits'] + $data['total_senior_english_credits']
                ?>
            </td>
        </tr>
		<tr>
            <td>校訂博雅</td>
            <td>
                <?=
					$data['total_school_general_credits']
                ?>
            </td>
        </tr>
		<tr>
            <td>博雅</td>
            <td>
                <?= 
                    $data['final_general_credits']
                ?>
            </td>
        </tr>
		<tr>
            <td>必修</td>
            <td>
                <?= 
                    $data['total_required_credits']
                ?>
            </td>
        </tr>
		<tr>
            <td>系內選修</td>
            <td>
                <?= 
                    $data['total_elective_credits']
                ?>
            </td>
        </tr>
		<tr>
			<td>系外選修</td>
            <td>
                <?= 
                    $data['total_other_credits']

                ?>
            </td>
		</tr>
		<tr>
			<td>總學分</td>
            <td>
                <?= 
                    $data['total_credits']
                ?>
            </td>
		</tr>
    </table>
	<?php
	// 檢查體育課程是否少於4堂
	if ($data['total_sports_courses'] < 4) {
		echo "<div class='alert alert-danger mt-3'>無法畢業：體育課程少於4堂。</div>";
	}
	else if ($data['total_credits'] < 135) {
		echo "<div class='alert alert-danger mt-3'>無法畢業：總學分少於135學分。</div>";
	}
	else if ($data['total_core_credits'] < 12){
		echo "<div class='alert alert-danger mt-3'>無法畢業：核心選修學分少於12學分。</div>";
	}
	else{
		echo "<p class='success'>恭喜畢業!!!</p>";
	}
	?>
</div>
</section>

<!-- 引入 Bootstrap 和 jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
