<!DOCTYPE html>
<html>
    <title>PHP If Else</title>
<body>
    <form action=""method="POST">
      <br>  Phương trình có dạng ax + b = 0 <br>
        a: </br> <input type="text" name = "a" /> <br>
        b: </br> <input type="text" name = "b" /> <br>
        <input type='submit' class="button" name="dangnhap" value='Phương trình là: ' />
    </form>
    <?php
     if(isset($_POST["dangnhap"])) {
        $x = $_POST['a'];
        $y = $_POST['b'];
        echo "Phương trình bậc nhất là: ".$x ."x + $y = 0 " ;
     }
       if($x == 0) {
        if($y==0) {
            echo "<br> Phương trình có vô số nghiệm";
        }
        else {
            echo "<br> Phương trình vô nghiệm";
        }
       }
       else {
        $k = -$y / $x;
        echo "<br> Phương trình có một nghiệm x = $k";
       }
    ?>
</body>

</html>