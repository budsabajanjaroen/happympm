<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login.php");
    exit;
}

require("../db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $name_th_award = $_POST['name_th_award'];
    $name_en_award = $_POST['name_en_award'];
    $detail_th_award = $_POST['detail_th_award'];
    $detail_en_award = $_POST['detail_en_award'];

    // เตรียมคำสั่ง SQL สำหรับเพิ่มข้อมูลในตาราง award โดยยังไม่ใส่รูปภาพ
    $sql = "INSERT INTO award (name_th_award, name_en_award, detail_th_award, detail_en_award) VALUES (:name_th, :name_en, :detail_th, :detail_en)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([
        'name_th' => $name_th_award,
        'name_en' => $name_en_award,
        'detail_th' => $detail_th_award,
        'detail_en' => $detail_en_award
    ])) {
        // รับ ID ของข่าวสารที่เพิ่ม
        $id_award = $pdo->lastInsertId();
        $uploadDir = "../assets/img/award/$id_award/";

        // สร้างโฟลเดอร์สำหรับอัพโหลดไฟล์ถ้ายังไม่มี
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // อัพโหลดไฟล์รูปภาพสำหรับ img_1_award และ img_2_award
        $imageFields = ['img_1_award', 'img_2_award'];
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

        // อัพโหลดไฟล์รูปภาพสำหรับ img_3_award (array)
        if (isset($_FILES['img_3_award'])) {
            $uploadedFiles['img_3_award'] = [];

            foreach ($_FILES['img_3_award']['tmp_name'] as $key => $tmpName) {
                if ($_FILES['img_3_award']['error'][$key] === UPLOAD_ERR_OK) {
                    $fileName = basename($_FILES['img_3_award']['name'][$key]);
                    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $newFileName = 'img_3_award_' . $key . '.' . $fileExtension;
                    $destination = $uploadDir . $newFileName;

                    if (move_uploaded_file($tmpName, $destination)) {
                        $uploadedFiles['img_3_award'][] = $newFileName;
                    } else {
                        echo "<script>alert('เกิดข้อผิดพลาดในการอัพโหลดรูปภาพ img_3_award $key');</script>";
                    }
                }
            }
        }

        // อัพเดตข้อมูลไฟล์รูปภาพในฐานข้อมูล
        $sqlUpdate = "UPDATE award SET img_1_award = :img1, img_2_award = :img2, img_3_award = :img3 WHERE id_award = :id_award";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->execute([
            'img1' => $uploadedFiles['img_1_award'] ?? null,
            'img2' => $uploadedFiles['img_2_award'] ?? null,
            'img3' => implode(',', $uploadedFiles['img_3_award'] ?? []), // เก็บชื่อไฟล์ img_3_award เป็น string ที่คั่นด้วยเครื่องหมายจุลภาค
            'id_award' => $id_award
        ]);

        echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location.href='list_award.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');</script>";
    }
}
?>
