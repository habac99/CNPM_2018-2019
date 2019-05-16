
<?php
    include('connect.php');
    include('functionlogin.php');
    $username = $_SESSION['username'];
    $query = mysqli_query($connect,"select * from hocsinh where stUsername = '{$username}'");
    $result = mysqli_fetch_array($query);


?>

<html>
<head>
        
<link rel="stylesheet" type="text/css" href="Styles/thongtin.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">

</head>
<body>
    <div class="topnav">
    <a href="trangchuhs.php">Trang chủ</a>
    <a href="thongtincanhan.php" class="active">Thông tin</a>
    <a href="doexam.php"  >Làm bài </a>
    <a href="history.php">Lịch sử làm bài</a>
    <a href="logout.php" >Đăng xuất </a>
        <p><?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql =  "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";
            $result = $connect->query($sql); if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) { echo 'Xin Chào : '. $row["fullName"] .'
              '; } } else { echo "0 result"; } mysqli_close($connect);
        ?>
        </p>
    </div>
    <div class = "content" id="thongtin">
        <!--Form php kết nói database-->
    <p style="font-size: 20px">Thông tin cá nhân :</p>
    <form action="">
        <div class="row">
         <div class="col-15">
            <label for="name">Họ và Tên</label>
        </div>
         <div class="col-70">
            
            <input type="text" name="name" id="name" value="<?php echo $result['fullName']?>" >
         </div>
        </div>
        <div class="row">
            <div class="col-15">
                    <label for="dateofbirth">Ngày sinh</label>         
            </div>
            <div class="col-70">
                   
                    <input type="date" name="dateofbirth" id="dateofbirth" value="<?php echo $result['Birthday']?>" >
                    <label for="gender" >Giới tính</label>
                    <select id="gender" name="gender" id="gender" value="<?php echo $result['gender']?>" >
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                    </select>
                    
            </div>
        </div>
        <div class="row">


        </div>
        <div class="row">
                <div class="col-15">
                    <!--Quảng cáo-->
                    <label for="email">Địa chỉ email </label>
                </div>
                <div class="col-70">
                        
                    <input type="email" name="email" id="country" value="<?php echo $result['Email']?>">
                </div>
        </div>
        <div class="row">
            <div class="col-15">
                <label for="phonenumber">Số diện thoại</label>
            </div>
            <div class="col-70">
                <input type="text" name="phonenumber" id="phonenumber" value="<?php echo $result['PhoneNumber']?>">

            </div>
        </div>
        <div class="row">
            <div class="col-70">
                <input class="submit" type='submit'  name="save" value='Lưu thông tin' />
            </div>
        </div>
    </form>
    </div>
<!--    <script>-->
<!--        function fixFunction(){-->
<!--            var input = document.getElementsByTagName('input');-->
<!--            for (var i = input.length, n = 0; n < i; n++){-->
<!--                input[n].disabled = !input[n].disabled;-->
<!--            }-->
<!--        }-->
<!--    </script>-->
</body>
</html>