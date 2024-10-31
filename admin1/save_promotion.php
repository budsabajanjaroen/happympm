<?php
// session_start();
require "../db_connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $name_th_promotion = $_POST['name_th_promotion'];
    $name_en_promotion = $_POST['name_en_promotion'];
    $detail_th_promotion = $_POST['detail_th_promotion'];
    $detail_en_promotion = $_POST['detail_en_promotion'];
    $start_date_promotion = $_POST['start_date_promotion'];
    $end_date_promotion = $_POST['end_date_promotion'];
    $type_promotion = $_POST['type_promotion'];

    // เริ่มการทำธุรกรรม
    $pdo->beginTransaction();

    try {
        // บันทึกข้อมูลโปรโมชั่นลงในฐานข้อมูล
        $sql = "INSERT INTO promotion (name_th_promotion, name_en_promotion, detail_th_promotion, detail_en_promotion, start_date_promotion, end_date_promotion, type_promotion)
                VALUES (:name_th_promotion, :name_en_promotion, :detail_th_promotion, :detail_en_promotion, :start_date_promotion, :end_date_promotion, :type_promotion)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name_th_promotion' => $name_th_promotion,
            ':name_en_promotion' => $name_en_promotion,
            ':detail_th_promotion' => $detail_th_promotion,
            ':detail_en_promotion' => $detail_en_promotion,
            ':start_date_promotion' => $start_date_promotion,
            ':end_date_promotion' => $end_date_promotion,
            ':type_promotion' => $type_promotion
        ]);

        // รับค่า ID โปรโมชั่นที่เพิ่งถูกสร้างขึ้น
        $id_promotion = $pdo->lastInsertId();

        // สร้างไดเรกทอรีเก็บรูปภาพถ้ายังไม่มี
        $upload_dir = "../assets/img/promotion/$id_promotion/";
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // ฟังก์ชันช่วยในการอัปโหลดรูปภาพ
        function uploadImage($file, $upload_dir, $field_name) {
            $file_name = basename($file[$field_name]['name']);
            $target_path = $upload_dir . $file_name;

            if (move_uploaded_file($file[$field_name]['tmp_name'], $target_path)) {
                return $file_name; // คืนชื่อไฟล์ถ้าสำเร็จ
            } else {
                return null; // คืนค่า null ถ้าล้มเหลว
            }
        }

        // อัปโหลดรูปภาพโปรโมชั่น (img_1_promotion, img_2_promotion)
        $img_1_promotion = uploadImage($_FILES, $upload_dir, 'img_1_promotion');
        $img_2_promotion = uploadImage($_FILES, $upload_dir, 'img_2_promotion');

        // สำหรับรูปภาพเพิ่มเติม (img_3_promotion)
        $additional_images = [];
        if (isset($_FILES['img_3_promotion'])) {
            foreach ($_FILES['img_3_promotion']['name'] as $key => $name) {
                if ($_FILES['img_3_promotion']['tmp_name'][$key]) {
                    $file_name = basename($name);
                    $target_path = $upload_dir . $file_name;
                    if (move_uploaded_file($_FILES['img_3_promotion']['tmp_name'][$key], $target_path)) {
                        $additional_images[] = $file_name;
                    }
                }
            }
        }
        $img_3_promotion = json_encode($additional_images);

        // อัปเดตข้อมูลรูปภาพลงในฐานข้อมูล
        $sql_update = "UPDATE promotion SET img_1_promotion = :img_1_promotion, img_2_promotion = :img_2_promotion, img_3_promotion = :img_3_promotion WHERE id_promotion = :id_promotion";
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->execute([
            ':img_1_promotion' => $img_1_promotion,
            ':img_2_promotion' => $img_2_promotion,
            ':img_3_promotion' => $img_3_promotion,
            ':id_promotion' => $id_promotion
        ]);

        // ทำการ commit ธุรกรรม
        $pdo->commit();

        // Redirect ไปที่หน้าแสดงรายการโปรโมชั่น
        header("Location: promotion.php");
        exit;
    } catch (Exception $e) {
        // หากเกิดข้อผิดพลาด ทำการ rollback ธุรกรรม
        $pdo->rollBack();
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
        exit;
    }
} else {
    header("Location: add_promotion.php");
    exit;
}
