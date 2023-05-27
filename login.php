<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "codeandpunch";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["role"]) && isset($_POST["username"]) && isset($_POST["password"])) {
        $role = $_POST["role"];
        $username = $_POST["username"];
        $password = $_POST["password"];

// Truy vấn kiểm tra thông tin đăng nhập
$loginQuery = "SELECT * FROM $role WHERE username = '$username' AND password = '$password'";
$loginResult = $conn->query($loginQuery);

if ($loginResult !== false && $loginResult->num_rows > 0) {
    // Lấy thông tin tài khoản từ hàng kết quả truy vấn
    $row = $loginResult->fetch_assoc();
    $accountName = $row['username'];
    $accountPassword = $row['password'];

    // Lưu thông tin vào SESSION
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone_number'] = $row['phone_number'];

    echo "Đăng nhập thành công<br>";
    echo "Tên tài khoản: " . $accountName . "<br>";
    echo "Mật khẩu: " . $accountPassword . "<br>";

    // Chuyển hướng đến trang khác tùy theo vai trò
    if ($role == "teacher") {
        header('Location: teacher.php');
        exit;
    } elseif ($role == "student") {
        header('Location: student.php');
        exit;
    }
}
 else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng";
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin đăng nhập";
    }
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Code And Punch</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        .video-background video {
            min-width: 100%;
            min-height: 100%;
        }
        .content {
            text-align: center;
            margin-top: 10px;
            color: #fff;
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="video-background">
        <video autoplay loop>
            <source src="Facebook.mp4" type="video/mp4">
        </video>
    </div>

    <div class="content">
        <h2>Đăng nhập giáo viên</h2>
        <form action="" method="POST">
            <input type="hidden" name="role" value="teacher">
            Tài Khoản: <br>
            <input type="text" name="username" /><br>
            Mật Khẩu: <br>
            <input type="password" name="password" /><br>
            <input type='submit' class="button" value='Đăng nhập' />
        </form>
    </div>

    <div class="content">
        <h2>Đăng nhập học sinh</h2>
        <form action="" method="POST">
            <input type="hidden" name="role" value="student">
            Tài Khoản: <br>
            <input type="text" name="username" /><br>
            Mật Khẩu: <br>
            <input type="password" name="password" /><br>
            <input type='submit' class="button" value='Đăng nhập' />
        </form>
    </div>
</body>
</html>
