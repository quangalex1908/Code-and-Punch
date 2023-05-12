<?php
// khai báo session
session_start();
//khai báo utf-8 để hiển thị tiếng việt
header('Content_Type:text/html;charset=UTF-8');
// xử lý đăng nhập $_GET $_POST
if(isset($_POST["dangnhap"])) {
    //kết nối với database
    include('connect.php');
    // lấy dữ liệu nhập vào
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT username,password FROM users WHERE username='$username' and password = '$password'";
    
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result) <= null) { 
        echo "tên đăng nhập hoặc mật khẩu không đúng";
    }
    else {
        echo "Đăng nhập thành công";
        header("location: Search_User.php");
    }
    


}

?>

<!DOCTYPE html>
<html>
<title>Test web</title>
<body>
    <form action="" method="POST">
    username :</br> <input type="text" name = "username" /> </br>
    password :</br> <input type="password" name = "password" /> </br>
    <input type='submit' class="button" name="dangnhap" value='Đăng nhập' />
    </form>

</body>
</html>