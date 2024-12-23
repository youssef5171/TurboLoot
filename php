<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "turboloot";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
  die("فشل الاتصال: " . $conn->connect_error);
}

// إضافة طلب جديد
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $game = $_POST["game"];
    $amount = $_POST["amount"];
    $total_amount = $amount * 1.03;  // إضافة 3% ضريبة

    $sql = "INSERT INTO orders (game, amount, total_amount, status)
    VALUES ('$game', '$amount', '$total_amount', 'قيد الانتظار')";

    if ($conn->query($sql) === TRUE) {
        echo "تم إضافة الطلب بنجاح";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
