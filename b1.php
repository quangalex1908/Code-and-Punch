<!DOCTYPE html>
<html>
    <title>Học PHP</title>
    <body>
        <form action=""method="POST">
            username: </br> <input type="text" name = "username" /> <br>
            password: </br> <input type="password" name = "password" /> <br>
            <input type='submit' class="button" name="dangnhap" value='Đăng nhập' />
        </form>
        <?php
        if(isset($_POST["dangnhap"])) {
            echo("<br>username: " .$_POST['username']);
            echo("<br>password: " .$_POST['password']);
        }
        ?>
    </body>
</html>