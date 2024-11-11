<?php
session_start();
include '../db_connect.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminn WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id_admin'];
        $_SESSION['loggedin'] = true;
        header("Location: index.html"); // เปลี่ยนไปหน้าแรกเมื่อเข้าสู่ระบบสำเร็จ
        exit();
    } else {
        $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        
        .login-container h2 {
            color: #6e8efb;
            margin-bottom: 1.5rem;
        }
        
        .login-container .form-group input {
            height: 45px;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .login-container .btn-login {
            background: #6e8efb;
            color: white;
            font-weight: bold;
            height: 45px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .login-container .btn-login:hover {
            background: #576cd6;
        }
        
        .login-container .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2><i class="fas fa-user-circle"></i> Login</h2>
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-login btn-block">Login</button>
            <?php if ($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
        <p class="mt-3"><a href="register.php">Create an Account</a></p>
    </div>
</body>

</html>
