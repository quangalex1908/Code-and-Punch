<?php
require './functions.php';
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

// Xử lý các chức năng của Giáo viên
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý thêm sinh viên
    if (isset($_POST["addStudent"])) {
        addStudent($conn, $_POST["username"], $_POST["password"], $_POST["name"], $_POST["email"], $_POST["phone_number"]);
    }

    // Xử lý sửa thông tin sinh viên
    if (isset($_POST["editStudent"])) {
        editStudent($conn, $_POST["student_id"], $_POST["name"], $_POST["email"], $_POST["phone_number"]);
    }

    // Xử lý xóa sinh viên
    if (isset($_POST["deleteStudent"])) {
        deleteStudent($conn, $_POST["student_id"]);
    }

    // Xử lý upload file bài tập
    if (isset($_POST["uploadAssignment"])) {
        handleFileUpload($conn, $_FILES["assignment_file"]);
    }
}
?>

<html>
<head>
    <title>Trang Giáo viên</title>
</head>
<body>
    <h1>Chào mừng, Giáo viên <?php echo $_SESSION['username']; ?></h1>

    <!-- Form thêm sinh viên -->
    <h2>Thêm sinh viên</h2>
    <form method="post" action="">
        <!-- Các trường thông tin cho sinh viên -->
        <input type="text" name="username" placeholder="Tài khoản">
        <input type="password" name="password" placeholder="Mật khẩu">
        <input type="text" name="name" placeholder="Họ và tên">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="phone_number" placeholder="Số điện thoại">
        <input type="submit" name="addStudent" value="Thêm sinh viên">
    </form>

    <!-- Form sửa thông tin sinh viên -->
    <h2>Sửa thông tin sinh viên</h2>
    <form method="post" action="">
        <!-- Chọn sinh viên cần sửa -->
        <input type="text" name="student_id" placeholder="ID sinh viên">
        <!-- Các trường thông tin cho sinh viên -->
        <input type="text" name="name" placeholder="Họ và tên">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="phone_number" placeholder="Số điện thoại">
        <input type="submit" name="editStudent" value="Sửa thông tin">
    </form>

    <!-- Form xóa sinh viên -->
    <h2>Xóa sinh viên</h2>
    <form method="post" action="">
        <!-- Chọn sinh viên cần xóa -->
        <input type="text" name="student_id" placeholder="ID sinh viên">
        <input type="submit" name="deleteStudent" value="Xóa sinh viên">
    </form>

    <!-- Form upload bài tập -->
    <h2>Upload bài tập</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <!-- Các trường thông tin cho bài tập -->
        <input type="file" name="assignment_file">
        <input type="submit" name="uploadAssignment" value="Upload bài tập">
    </form>
</body>
</html>
