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
// 處理登出
if (isset($_POST['logout'])) {
    session_unset(); // 清除所有session變數
    session_destroy(); // 銷毀session
    header("Location: homePage.php"); // 重定向回首頁
    exit();
}
// 定義一個存儲結果的陣列
$data = [
    'chinese' => [],
    'junior_english' => [],
    'senior_english' => [],
    'school_general' => [],
	'general' => [],
	'required' =>[],
	'elective'=> [],
	'language' => [],
	'other' => [],
	'sports' => [],
    'total_chinese_credits' => 0,
    'total_junior_english_credits' => 0,
    'total_senior_english_credits' => 0,
	'total_school_general_credits' => 0,
	'total_general_credits' => 0,
	'final_general_credits' => 0,
	'total_required_credits' => 0,
	'total_elective_credits' => 0,
	'total_core_credits' => 0,
	'total_language_credits' => 0,
	'total_other_credits' => 0,
    'total_sports_courses' => 0,
	'extra_elective_credits' => 0,
	'extra_general_credits' =>0,
];
// 查詢國文課程
$sql_chinese_sum = "
    SELECT SUM(c.credit) AS sum
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ? 
      AND c.course_name LIKE '%國文%'
      AND c.dept_name = '共同教育中心語文教育組';
";
$stmt_sum = $conn->prepare($sql_chinese_sum);
$stmt_sum->bind_param("s", $student_ID);
$stmt_sum->execute();
$result_sum = $stmt_sum->get_result();
$row_sum = $result_sum->fetch_assoc();
$data['total_chinese_credits'] = min($row_sum['sum'], 4);

$sql_chinese = "
    SELECT c.course_ID, c.course_name, c.dept_name, c.credit 
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ? 
      AND c.course_name LIKE '%國文%'
      AND c.dept_name = '共同教育中心語文教育組';
";
$stmt = $conn->prepare($sql_chinese);
$stmt->bind_param("s",  $student_ID);
$stmt->execute();
$result_chinese = $stmt->get_result();
while ($row = $result_chinese->fetch_assoc()) {
    $data['chinese'][] = $row;
}

// 查詢大一英文課程
$sql_junior_english_sum = "
    SELECT SUM(c.credit) AS sum
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ? 
      AND c.course_name LIKE '%國文%'
      AND c.dept_name = '共同教育中心語文教育組';
";
$stmt_sum = $conn->prepare($sql_junior_english_sum);
$stmt_sum->bind_param("s", $student_ID);
$stmt_sum->execute();
$result_sum = $stmt_sum->get_result();
$row_sum = $result_sum->fetch_assoc();
$data['total_junior_english_credits'] = min($row_sum['sum'], 4);

$sql_junior_english = "
    SELECT c.course_ID, c.course_name, c.dept_name, c.credit
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ? 
      AND c.course_ID IN ('B9D01969', 'B9D01968');
";
$stmt = $conn->prepare($sql_junior_english);
$stmt->bind_param("s", $student_ID);
$stmt->execute();
$result_junior_english = $stmt->get_result();
while ($row = $result_junior_english->fetch_assoc()) {
    $data['junior_english'][] = $row;
}
// 查詢大二進階英文課程
$sql_senior_english_sum = "
    SELECT SUM(c.credit) AS sum
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ? 
      AND c.course_name LIKE '%進階英文%';
";
$stmt_sum = $conn->prepare($sql_senior_english_sum);
$stmt_sum->bind_param("s", $student_ID);
$stmt_sum->execute();
$result_sum = $stmt_sum->get_result();
$row_sum = $result_sum->fetch_assoc();
$data['total_senior_english_credits'] = min($row_sum['sum'], 2);

$sql_senior_english = "
    SELECT c.course_ID, c.course_name, c.dept_name, c.credit
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ? 
      AND c.course_name LIKE '%進階英文%';
";
$stmt = $conn->prepare($sql_senior_english);
$stmt->bind_param("s", $student_ID);
$stmt->execute();
$result_senior_english = $stmt->get_result();
while ($row = $result_senior_english->fetch_assoc()) {
    $data['senior_english'][] = $row;
}
//查詢校訂博雅
$sql_school_general_sum = "
    SELECT SUM(c.credit) AS sum
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ? 
      AND c.course_ID IN ('B9M01Z64', 'B9M01024');
";
$stmt_sum = $conn->prepare($sql_school_general_sum);
$stmt_sum->bind_param("s", $student_ID);
$stmt_sum->execute();
$result_sum = $stmt_sum->get_result();
$row_sum = $result_sum->fetch_assoc();
$data['total_school_general_credits'] = $row_sum['sum'];

$sql_school_general = "
    SELECT c.course_ID, c.course_name, c.dept_name, c.credit
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ? 
      AND c.course_ID IN ('B9M01Z64', 'B9M01024');
";
$stmt = $conn->prepare($sql_school_general);
$stmt->bind_param("s", $student_ID);
$stmt->execute();
$result_school_general = $stmt->get_result();
while ($row = $result_school_general->fetch_assoc()) {
    $data['school_general'][] = $row;
}
//博雅
$sql_general_sum = "
    SELECT SUM(c.credit) AS sum
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.dept_name = '共同教育中心博雅教育組'
      AND c.course_ID NOT IN ('B9M01Z64', 'B9M01024');
";
$stmt_sum = $conn->prepare($sql_general_sum);
$stmt_sum->bind_param("s", $student_ID);
$stmt_sum->execute();
$result_sum = $stmt_sum->get_result();
$row_sum = $result_sum->fetch_assoc();
$data['total_general_credits'] = $row_sum['sum'];

$sql_general = "
    SELECT c.course_ID, c.course_name, c.dept_name, c.credit, c.field
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.dept_name = '共同教育中心博雅教育組'
      AND c.course_ID NOT IN ('B9M01Z64', 'B9M01024');
";
$stmt = $conn->prepare($sql_general);
$stmt->bind_param("s", $student_ID);
$stmt->execute();
$result_general = $stmt->get_result();

$general_field = ['人格', '民主', '經典', '自然' ,'科技' ,'美學', '全球', '歷史'];
$field_count = array_fill_keys($general_field, 0);

while ($row = $result_general->fetch_assoc()) {
    $data['general'][] = $row;
	if (in_array($row['field'], $general_field) && $field_count[$row['field']] < 2) {
        $data['final_general_credits'] += $row['credit'];
        $field_count[$row['field']]++; // 增加該領域的計數
    }
}

$data['final_general_credits'] = min($data['final_general_credits'], 14);
$data['extra_general_credits'] = $data['total_general_credits'] - $data['final_general_credits'];

//資工必修
$sql_required_sum = "
	SELECT SUM(c.credit) AS sum
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.required = 1;
";
$stmt_sum = $conn->prepare($sql_required_sum);
$stmt_sum->bind_param("s", $student_ID);
$stmt_sum->execute();
$result_sum = $stmt_sum->get_result();
$row_sum = $result_sum->fetch_assoc();
$data['total_required_credits'] = $row_sum['sum'];

$sql_required = "
	SELECT c.course_ID, c.course_name, c.dept_name, c.credit
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.required = 1;
";
$stmt = $conn->prepare($sql_required);
$stmt->bind_param("s", $student_ID);
$stmt->execute();
$result_required = $stmt->get_result();
while ($row = $result_required->fetch_assoc()) {
    $data['required'][] = $row;
}

//系內

$sql_elective_sum = "
	SELECT SUM(c.credit) AS sum
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.required = 0
	  AND c.dept_name = '資訊工程學系';
";
$stmt_sum = $conn->prepare($sql_elective_sum);
$stmt_sum->bind_param("s", $student_ID);
$stmt_sum->execute();
$result_sum = $stmt_sum->get_result();
$row_sum = $result_sum->fetch_assoc();
$data['total_elective_credits'] = $row_sum['sum'];

$sql_elective = "
	SELECT c.course_ID, c.course_name, c.dept_name, c.credit, c.core
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.required = 0
	  AND c.dept_name = '資訊工程學系';
";
$stmt = $conn->prepare($sql_elective);
$stmt->bind_param("s", $student_ID);
$stmt->execute();
$result_elective = $stmt->get_result();
while ($row = $result_elective->fetch_assoc()) {
    $data['elective'][] = $row;
	if($row['core']) $data['total_core_credits'] += $row['credit'];
}

$data['extra_elective_credits'] = max($data['total_elective_credits'] - 43, 0);
$data['total_elective_credits'] = min($data['total_elective_credits'], 43);

//系外
$sql_language_sum = "
	SELECT SUM(c.credit) AS sum
	FROM course c
	JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.course_name NOT LIKE '%國文%'
      AND c.dept_name = '共同教育中心語文教育組';
";
$stmt_sum = $conn->prepare($sql_language_sum);
$stmt_sum->bind_param("s", $student_ID);
$stmt_sum->execute();
$result_sum = $stmt_sum->get_result();
$row_sum = $result_sum->fetch_assoc();
$data['total_language_credits'] = $row_sum['sum'];

$sql_language = "
	SELECT c.course_ID, c.course_name, c.dept_name, c.credit
	FROM course c
	JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.course_name NOT LIKE '%國文%'
      AND c.dept_name = '共同教育中心語文教育組';
";
$stmt = $conn->prepare($sql_language);
$stmt->bind_param("s", $student_ID);
$stmt->execute();
$result_language = $stmt->get_result();
while ($row = $result_language->fetch_assoc()) {
    $data['language'][] = $row;
}
$sql_other_sum = "
	SELECT SUM(c.credit) AS sum
	FROM course c
	JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.dept_name NOT IN ('資訊工程學系', '體育室', '共同教育中心語文教育組', '共同教育中心博雅教育組', '大學部英語課程(原外語中心)')
";
$stmt_sum = $conn->prepare($sql_other_sum);
$stmt_sum->bind_param("s", $student_ID);
$stmt_sum->execute();
$result_sum = $stmt_sum->get_result();
$row_sum = $result_sum->fetch_assoc();
$data['total_other_credits'] = $row_sum['sum'];

$sql_other = "
	SELECT c.course_ID, c.course_name, c.dept_name, c.credit
	FROM course c
	JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ?
	  AND c.dept_name NOT IN ('資訊工程學系', '體育室', '共同教育中心語文教育組', '共同教育中心博雅教育組', '大學部英語課程(原外語中心)')
";
$stmt = $conn->prepare($sql_other);
$stmt->bind_param("s", $student_ID);
$stmt->execute();
$result_other = $stmt->get_result();
while ($row = $result_language->fetch_assoc()) {
    $data['other'][] = $row;
}

$data['total_other_credits'] = min(
								$data['total_other_credits'] + $data['extra_elective_credits'] + 
								min($data['extra_general_credits'] + $data['total_language_credits'], 8), 
								11
							);
// 查詢體育課程
$sql_sports = "
    SELECT c.course_ID, c.course_name, c.dept_name, c.credit
    FROM course c
    JOIN my_course m ON c.course_ID = m.course_ID
    WHERE m.student_ID = ? AND c.dept_name = '體育室';
";
$stmt = $conn->prepare($sql_sports);
$stmt->bind_param("s", $student_ID);
$stmt->execute();
$result_sports = $stmt->get_result();
while ($row = $result_sports->fetch_assoc()) {
    $data['sports'][] = $row;
    $data['total_sports_courses']++;
}
$data['total_credits'] = $data['total_other_credits'] + $data['total_chinese_credits']+ $data['total_junior_english_credits'] + $data['total_senior_english_credits'] + 
						 $data['total_school_general_credits'] + $data['final_general_credits'] + $data['total_required_credits'] + $data['total_elective_credits'];


// 關閉資料庫連接
$conn->close();

// 將結果數據傳遞給 HTML
include 'countdisplay.php';
?>
