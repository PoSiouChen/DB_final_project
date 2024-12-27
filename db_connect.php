<?php
// 資料庫連線設定
$servername = "localhost";  // 資料庫伺服器地址（例如：localhost 或 IP 位址）
$username = "root";         // 資料庫使用者名稱
$password = "";             // 資料庫使用者密碼
$dbname = "database_final_project"; // 資料庫名稱

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}
?>
