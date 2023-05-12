<!DOCTYPE html>
<html>
    <title>Học Hàm PHP </title>
    <body>
        <form action=""method="POST">
            1: </br> <input type="text" name = "a" /> <br>
            2: </br> <input type="password" name = "b" /> <br>
            <input type='submit' class="button" name="dangnhap" value='Giải toán' />
        </form>
        <?php
        function kiemTraRong($a, $b) {
            if(!empty($a) && !empty($b))
            return true;
            else 
            return false;
        }
        function Tong($e, $g){
            return $e+$g;
        }

        if(isset($_POST["dangnhap"])) {
            $x = $_POST['a'];
            $y = $_POST['b'];
            if(kiemTraRong($x,$y)) {
                $t = Tong($x,$y);
                echo("<br> Kết quả là: $x + $y = $t");
            }
        }

        ?>
    </body>
</html>