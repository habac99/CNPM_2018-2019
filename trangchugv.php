<?php
    //Nhúng file kết nối với database
    include('connect.php');

    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
  
    session_start();
    
  
    
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>website</title>
    <link rel="stylesheet" type="text/css" href="Styles/thongtin.css" />
  </head>
  <body>
  <div class="topnav">
      <a href="trangchugv.php" class="active">Trang chủ</a>
      <a href="">Thông tin</a>
      <a href="upload.php" >Tải đề </a>
      <a href="bangxephang.php">Bảng Điểm</a>
      <a href="logout.php" class="button">Đăng xuất</a>
      <p>           
        <?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `giaovien` where tcUsername= '$username' limit 1";
            $result = $connect->query($sql); 
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) { echo 'Xin Chào : '. $row["fullName"] .'
              '; } } else { echo "0 result"; } mysqli_close($connect);
        ?>
        </p>
    </div>
    <div class="content">
      <div id="home"></div>

      <!--Thông tin cá nhân-->

      <div id="thongtin">
        <p style="font-size: 20px">Thông tin cá nhân :</p>
        <form action="thaydoithongtin.php" method="POST">
          <!--Cot 15 dau tien-->
          <div class="col-15">
            <div class="row" style="margin-top:10px;">
              <label for="name">Họ và Tên</label>
            </div>
            <div class="row" style="margin-top:12px;">
              <label for="dateofbirth">Ngày sinh</label>
            </div>
            <div class="row" style="margin-top:18px;">
              <label for="country">Quê quán </label>
            </div>
            <div class="row" style="margin-top:12px;">
              <label for="email">Địa chỉ email </label>
            </div>
            <div class="row" style="margin-top:12px;">
              <label for="phonenumber">Số diện thoại</label>
            </div>
          </div>
          <!--Cot 70-->
          <div class="col-70">
            <div class="row" style="margin-top:10px;">
              <?php
              $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `giaovien` where tcUsername= '$username' limit 1";
            $result = $connect->query($sql); if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) { echo '<input
              type="text" id="name" name="name" value="'. $row["fullName"] .'"
              >'; } } else { echo "0 result"; } mysqli_close($connect);
              ?>
            </div>

            <div class="row" style="margin-top:10px;" id="gioitinh">
              <?php
              $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `giaovien` where tcUsername= '$username' limit 1";
            $result = $connect->query($sql); 
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) { 
              echo '<input type="date" id="dateofbirth" name="dateofbirth" value="'. $row["Birthday"].'" >'; 
              } 
            } else {
               echo "0 result"; 
              }
              mysqli_close($connect); 
              ?>
              <label for="gender">Giới tính</label>

              <?php
              $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `giaovien` where tcUsername= '$username' limit 1";
            $result = $connect->query($sql); 
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<input type="text" id="gioitinh" name="gender" value="'. $row["gender"] .'" >';
            } 
          } else {
             echo "0 result"; 
            }
              mysqli_close($connect); 
              ?>
            </div>

            <div class="row" style="margin-top:10px;">
              <input
                type="text"
                name="country"
                id="country"
                value="Hà Nội"
                disabled
              />
            </div>

            <div class="row" style="margin-top:10px;">
              <?php
              $username = $_SESSION['username'];
                       $connect = mysqli_connect(
                         'localhost', 'root', '', 'cnpmdatabase'
                  );
                  $sql = "SELECT * FROM `giaovien` where tcUsername= '$username' limit 1";
                  $result = $connect->query($sql); if (mysqli_num_rows($result)
              > 0) { while($row = mysqli_fetch_assoc($result)) { echo '<input
              type="email" id="email" name="email" value="'.
              $row["email"] .'" >'; } } else { echo "0 result"; }
              mysqli_close($connect); ?>
            </div>

            <div class="row" style="margin-top:10px;">
              <?php
              $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `giaovien` where tcUsername= '$username' limit 1";
            $result = $connect->query($sql); if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) { echo '<input
              type="number" id="phonenumer" name="phonenumber" value="'.
              $row["phonenumber"] .'" >'; } } else { echo "0 result"; }
              mysqli_close($connect); ?>
            </div>

            <div class="row" style="margin:50px 0px;">
                
              <input class="submit" type="submit" name="signup" value="Xác nhận" />
              <button type="button" onclick="fixFunction()">
                Sửa thông tin cá nhân
              </button>
            </div>
          </div>
        </form>
        <div class="col-15">
          <div class="imagebox">

          </div>
        </div>
      </div>
      
      <!--Tải đề lên hệ thống -->
              
      
    <script>
        function fixFunction(){
            var input = document.getElementsByTagName('input');
            for (var i = input.length, n = 0; n < i; n++){
                input[n].disabled = false;
            }
        }
    </script>
  </body>
</html>