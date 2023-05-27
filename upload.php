<!DOCTYPE html>
<html>
    <title>Up Load File</title>
    <boddy>
        <form action = ""method="POST" enctype="multipart/form-data">
            Chọn file: </br> <input type ="file" name = "upload" />
            <input type ='submit' class = "button" name ="login" value = "Upload"/>
        </form>
        <?php
        $targetDir = 'upload/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        
            if(isset($_POST['login'])){
                if($_FILES['upload']['error'] > 0) {
                    echo "<br> Có lỗi trong việc upload lên sever!";
                }
                else {
                    move_uploaded_file($_FILES['upload']['tmp_name'],
                    'upload/' .$_FILES['upload']['name']);
                    echo "<br> Upload dữ liệu lên sever thành công! ";
                    echo "<pre>";
                    print_r($_FILES['upload']);
                    echo "</pre>";
                    $st = "upload/" .$_FILES['upload']['name'];
                    echo "<br> <br> <a href='$st'>Dowload về máy tính</a>";

                }
            }
        ?>


    </boddy>



</html>