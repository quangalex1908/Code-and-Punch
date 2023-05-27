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

            echo "Đăng nhập thành công<br>";
            echo "Tên tài khoản: " . $accountName . "<br>";
            echo "Mật khẩu: " . $accountPassword . "<br>";

            // Chuyển hướng đến trang khác tùy theo vai trò
            if ($role == "teacher") {
                header('Location: ifElse.php');
                exit;
            } elseif ($role == "student") {
                header('Location: upload.php');
                exit;
            }
        } else {
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
</head>
<body>
    <h2>Đăng nhập giáo viên</h2>
    <form action="" method="POST">
        <input type="hidden" name="role" value="teacher">
        Tài Khoản: <br>
        <input type="text" name="username" /><br>
        Mật Khẩu: <br>
        <input type="password" name="password" /><br>
        <input type='submit' class="button" value='Đăng nhập' />
    </form>

    <h2>Đăng nhập học sinh</h2>
    <form action="" method="POST">
        <input type="hidden" name="role" value="student">
        Tài Khoản: <br>
        <input type="text" name="username" /><br>
        Mật Khẩu: <br>
        <input type="password" name="password" /><br>
        <input type='submit' class="button" value='Đăng nhập' />
    </form>
</body>
</html>
