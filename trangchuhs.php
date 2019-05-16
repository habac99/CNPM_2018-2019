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
    <link rel="stylesheet" type="text/css" href="Styles/thongtin.css">
  </head>
  <body>
  <div class="topnav">
    
        <a href="#home" >Trang chủ</a>
        <a href="#thongtin" >Thông tin</a>
        <a href="#lambai" >Làm bài </a>
        <a href="#bangdiem" >Bảng xếp hạng</a>
        <button href="logout.php">Đăng xuất</button>
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
  <div id ="home" class="content"> 

  </div>

  <div id="thongtin" class = "content">
  <p style="font-size: 20px">Thông tin cá nhân :</p>
    <form action="">
        <div class="row">
         <div class="col-15">
            <label for="name">Họ và Tên</label>
        </div>
         <div class="col-70">
            <?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";
            $result = $connect->query($sql);
           
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<input type="text" id="name" name="name" value="'. $row["fullName"] .'" disabled>';
              
              }
            }
              else {
                echo "0 result";
              }
              mysqli_close($connect); 
            ?>
         </div>
        </div>
        <div class="row">
            <div class="col-15">
                    <label for="dateofbirth">Ngày sinh</label>         
            </div>
            <div class="col-70">
            <?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql =  "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";;
            $result = $connect->query($sql);
           
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<input type="date" id="dateofbirth" name="dateofbirth" value="'. $row["Birthday"] .'" disabled>';
              
              }
            }
              else {
                echo "0 result";
              }
              mysqli_close($connect); 
            ?>
                    <label for="gender" >Giới tính</label>
                    <select id="gender" name="gender" id="gender" value="Nam" disabled>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                    </select>
                    
            </div>
        </div>
        <div class="row">
            <div class="col-15">
                <!--Quảng cáo-->
                <label for="country">Quê quán </label>
            </div>
            <div class="col-70">
                    
                    <input type="text" name="country" id="country" value="Hà Nội" disabled>
            </div>
        </div>
        <div class="row">
                <div class="col-15">
                    <!--Quảng cáo-->
                    <label for="email">Địa chỉ email </label>
                    </div>
                    <div class="col-70">
                    <?php
                    $username = $_SESSION['username'];
                    $connect = mysqli_connect(
                         'localhost', 'root', '', 'cnpmdatabase'
                  );
                  $sql = "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";
                  $result = $connect->query($sql);
           
                  if (mysqli_num_rows($result) > 0) {
                   while($row = mysqli_fetch_assoc($result)) {
                      echo '<input type="email" id="dateofbirth" name="dateofbirth" value="'. $row["Email"] .'" disabled>';
              
              }
            }
              else {
                echo "0 result";
              }
              mysqli_close($connect); 
            ?>
                </div>
        </div>
        <div class="row">
            <div class="col-15">
                <label for="phonenumber">Số diện thoại</label>
            </div>
            <div class="col-70">
            <?php
            $username = $_SESSION['username'];
            $connect = mysqli_connect(
              'localhost', 'root', '', 'cnpmdatabase'
            );
            $sql = "SELECT * FROM `hocsinh` where stUsername='$username' limit 1";
            $result = $connect->query($sql);
           
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
              echo '<input type="number" id="phonenumer" name="phonenumber" value="'. $row["PhoneNumber"] .'" disabled>';
              
              }
            }
              else {
                echo "0 result";
              }
              mysqli_close($connect); 
            ?>

            </div>
        </div>
        <div class="row">
            <div class="col-70">
                <button type="button" onclick="fixFunction()">Sửa thông tin cá nhân</button>
            </div>
        </div>
    </form>

      
    <div class="lambai">
      <!--Đang nghiên cứu-->
              <div class = "row">
                <a href="">Đề 1</a>
                <a href="">Đề 2</a>
              </div>
    </div>

    <div class = "bangdiem">
      <div class = "row">
              <!--Lấy bảng điểm từ database-->
              <table>
                <tr>
                  <td>Đề 1</td>
                  <td>Điểm đề 1 </td>
                </tr>
                <tr>
                  <td>
                    Đề 2
                  </td>
                  <td>Điểm Đề 2</td>
                </tr>
              </table>
      </div>
            
    </div>
              
            
    <script>
        function fixFunction(){
            var input = document.getElementsByTagName('input');
            for (var i = input.length, n = 0; n < i; n++){
                input[n].disabled = !input[n].disabled;
            }
        }
        function randomf(){
          var input = document.getElementsByClass("")
        }
    </script>

  </div>
  </body>
</html>