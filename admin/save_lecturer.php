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
    $name_th_lecturer = $_POST['name_th_lecturer'];
    $name_en_lecturer = $_POST['name_en_lecturer'];

    // เตรียมคำสั่ง SQL สำหรับเพิ่มข้อมูลเข้าในฐานข้อมูล
    $sql = "INSERT INTO lecturer (name_th_lecturer, name_en_lecturer) VALUES (:name_th, :name_en)";

    // เตรียมการส่งข้อมูล
    $stmt = $pdo->prepare($sql);

    // รันคำสั่งและตรวจสอบผลลัพธ์
    if ($stmt->execute(['name_th' => $name_th_lecturer, 'name_en' => $name_en_lecturer])) {
        echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location.href='list_lecturer.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');</script>";
    }
}
?>
