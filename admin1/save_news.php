<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login.php");
    exit;
}

require("../db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $name_th_news = $_POST['name_th_news'];
    $name_en_news = $_POST['name_en_news'];
    $detail_th_news = $_POST['detail_th_news'];
    $detail_en_news = $_POST['detail_en_news'];

    // เตรียมคำสั่ง SQL สำหรับเพิ่มข้อมูลในตาราง news โดยยังไม่ใส่รูปภาพ
    $sql = "INSERT INTO news_event (name_th_news, name_en_news, detail_th_news, detail_en_news) VALUES (:name_th, :name_en, :detail_th, :detail_en)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([
        'name_th' => $name_th_news,
        'name_en' => $name_en_news,
        'detail_th' => $detail_th_news,
        'detail_en' => $detail_en_news
    ])) {
        // รับ ID ของข่าวสารที่เพิ่ม
        $id_news = $pdo->lastInsertId();
        $uploadDir = "../assets/img/news/$id_news/";

        // สร้างโฟลเดอร์สำหรับอัพโหลดไฟล์ถ้ายังไม่มี
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // อัพโหลดไฟล์รูปภาพสำหรับ img_1_news และ img_2_news
        $imageFields = ['img_1_news', 'img_2_news'];
        $uploadedFiles = [];

        foreach ($imageFields as $field) {
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES[$field]['tmp_name'];
                $fileName = basename($_FILES[$field]['name']);
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $newFileName = $field . '.' . $fileExtension;
                $destination = $uploadDir . $newFileName;

                // ย้ายไฟล์ไปยังตำแหน่งที่ต้องการ
                if (move_uploaded_file($fileTmpPath, $destination)) {
                    $uploadedFiles[$field] = $newFileName;
                } else {
                    echo "<script>alert('เกิดข้อผิดพลาดในการอัพโหลดรูปภาพ $field');</script>";
                }
            }
        }

        // อัพโหลดไฟล์รูปภาพสำหรับ img_3_news (array)
        if (isset($_FILES['img_3_news'])) {
            $uploadedFiles['img_3_news'] = [];

            foreach ($_FILES['img_3_news']['tmp_name'] as $key => $tmpName) {
                if ($_FILES['img_3_news']['error'][$key] === UPLOAD_ERR_OK) {
                    $fileName = basename($_FILES['img_3_news']['name'][$key]);
                    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $newFileName = 'img_3_news_' . $key . '.' . $fileExtension;
                    $destination = $uploadDir . $newFileName;

                    if (move_uploaded_file($tmpName, $destination)) {
                        $uploadedFiles['img_3_news'][] = $newFileName;
                    } else {
                        echo "<script>alert('เกิดข้อผิดพลาดในการอัพโหลดรูปภาพ img_3_news $key');</script>";
                    }
                }
            }
        }

        // อัพเดตข้อมูลไฟล์รูปภาพในฐานข้อมูล
        $sqlUpdate = "UPDATE news_event SET img_1_news = :img1, img_2_news = :img2, img_3_news = :img3 WHERE id_news = :id_news";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->execute([
            'img1' => $uploadedFiles['img_1_news'] ?? null,
            'img2' => $uploadedFiles['img_2_news'] ?? null,
            'img3' => implode(',', $uploadedFiles['img_3_news'] ?? []), // เก็บชื่อไฟล์ img_3_news เป็น string ที่คั่นด้วยเครื่องหมายจุลภาค
            'id_news' => $id_news
        ]);

        echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location.href='list_news.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');</script>";
    }
}
?>
