<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login.php");
    exit;
}

require("../db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $name_th_activity = $_POST['name_th_activity'];
    $name_en_activity = $_POST['name_en_activity'];
    $detail_th_activity = $_POST['detail_th_activity'];
    $detail_en_activity = $_POST['detail_en_activity'];
    $branch = $_POST['branch'];
    $lecturer = $_POST['lecturer'];
    $start_date_activity = $_POST['start_date_activity'];
    $end_date_activity = $_POST['end_date_activity'];

    // แปลงวันที่ให้อยู่ในรูปแบบที่ MySQL รองรับ (yyyy-mm-dd)
    $start_date_activity = DateTime::createFromFormat('d/m/Y', $start_date_activity)->format('Y-m-d');
    $end_date_activity = DateTime::createFromFormat('d/m/Y', $end_date_activity)->format('Y-m-d');

    // เตรียมคำสั่ง SQL สำหรับเพิ่มข้อมูลในตาราง activity โดยยังไม่ใส่รูปภาพ
    $sql = "INSERT INTO activity (name_th_activity, name_en_activity, detail_th_activity, detail_en_activity, branch, lecturer, start_date_activity, end_date_activity) 
            VALUES (:name_th, :name_en, :detail_th, :detail_en, :branch, :lecturer, :start_date, :end_date)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([
        'name_th' => $name_th_activity,
        'name_en' => $name_en_activity,
        'detail_th' => $detail_th_activity,
        'detail_en' => $detail_en_activity,
        'branch' => $branch,
        'lecturer' => $lecturer,
        'start_date' => $start_date_activity,
        'end_date' => $end_date_activity
    ])) {
        // รับ ID ของกิจกรรมที่เพิ่ม
        $id_activity = $pdo->lastInsertId();
        $uploadDir = "../assets/img/activity/$id_activity/";

        // สร้างโฟลเดอร์สำหรับอัพโหลดไฟล์ถ้ายังไม่มี
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // อัพโหลดไฟล์รูปภาพสำหรับ img_1_activity และ img_2_activity
        $imageFields = ['img_1_activity', 'img_2_activity'];
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

        // อัพโหลดไฟล์รูปภาพสำหรับ img_3_activity (array)
        if (isset($_FILES['img_3_activity'])) {
            $uploadedFiles['img_3_activity'] = [];

            foreach ($_FILES['img_3_activity']['tmp_name'] as $key => $tmpName) {
                if ($_FILES['img_3_activity']['error'][$key] === UPLOAD_ERR_OK) {
                    $fileName = basename($_FILES['img_3_activity']['name'][$key]);
                    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $newFileName = 'img_3_activity_' . $key . '.' . $fileExtension;
                    $destination = $uploadDir . $newFileName;

                    if (move_uploaded_file($tmpName, $destination)) {
                        $uploadedFiles['img_3_activity'][] = $newFileName;
                    } else {
                        echo "<script>alert('เกิดข้อผิดพลาดในการอัพโหลดรูปภาพ img_3_activity $key');</script>";
                    }
                }
            }
        }

        // อัพเดตข้อมูลไฟล์รูปภาพในฐานข้อมูล
        $sqlUpdate = "UPDATE activity SET img_1_activity = :img1, img_2_activity = :img2, img_3_activity = :img3 WHERE id_activity = :id_activity";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->execute([
            'img1' => $uploadedFiles['img_1_activity'] ?? null,
            'img2' => $uploadedFiles['img_2_activity'] ?? null,
            'img3' => implode(',', $uploadedFiles['img_3_activity'] ?? []), // เก็บชื่อไฟล์ img_3_activity เป็น string ที่คั่นด้วยเครื่องหมายจุลภาค
            'id_activity' => $id_activity
        ]);

        echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location.href='list_activity.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล');</script>";
    }
}
?>
