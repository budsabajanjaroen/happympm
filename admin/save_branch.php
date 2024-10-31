<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login.php");
    exit;
}

require("../db_connect.php"); // ตรวจสอบว่า db_connect.php ใช้ PDO อย่างถูกต้อง

// ตรวจสอบว่ามีการส่งข้อมูลจากแบบฟอร์มหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $name_th_branch = $_POST['name_th_branch'];
    $name_en_branch = $_POST['name_en_branch'];

    // เตรียมคำสั่ง SQL สำหรับเพิ่มข้อมูลเข้าในฐานข้อมูล
    $sql = "INSERT INTO branch (name_th_branch, name_en_branch) VALUES (:name_th, :name_en)";

    // เตรียมการส่งข้อมูล
    $stmt = $pdo->prepare($sql);

    // รันคำสั่งและตรวจสอบผลลัพธ์
    if ($stmt->execute(['name_th' => $name_th_branch, 'name_en' => $name_en_branch])) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location.href='list_branch.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');</script>";
    }
}
?>
