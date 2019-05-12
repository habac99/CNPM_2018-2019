<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang đăng ký thành viên</title>
    <link rel="stylesheet" type="text/css" href="Styles/signup.css">
</head>
<body>

<form action="signuphandle.php" method="POST">
    <h1>Đăng ký</h1>
    <input class="inputt" placeholder="Tên đăng nhập" type="text" name = "txtUsername" required="">
    <input class="inputt" placeholder="Mật khẩu" type="password" name = "txtPassword"  required="">
<!--    <input class="inputt" placeholder="Repeat Password" type="password" required="">-->
    <input class="inputt" placeholder="Email" type="text" name = "txtEmail" required="">
    <input class="inputt" placeholder="Họ và Tên" type="text" name = "txtFullname" required="">
    <input class="inputt" placeholder="Số điện thoại" type="text" name = "txtPhonenumber" required="">
    <input class="inputt" placeholder="Ngày sinh" type="date" name = "txtBirthday" required="">

    <div>
        <input class="sex" name="txtGender" type="radio" value="Nam" id="hoc" />Nam
        <input class="sex" name="txtGender" type="radio" value="Nữ" />Nữ
    </div>
    <div>
        <input class="pos" name="position" type="radio" value="giaovien" id="hoc" />Giáo Viên
        <input class="pos" name="position" type="radio" value="hocsinh" />Học Sinh
    </div>
    <input class="submit" type="submit" value="Đăng ký" />
    <input class="reset" type="reset" value="Nhập lại" />
</form>
</body>
</html>
<?php
// Xử Lý Upload


// Nếu người dùng click Upload
if (isset($_POST['uploadclick']))
{
    // Nếu người dùng có chọn file để upload
    if (isset($_FILES['avatar']))
    {
        $name = $_FILES['avatar']['name'];
        $file_tmp = $_FILES['avatar']['tmp_name'];
        $location = "upload/";
        // Nếu file upload không bị lỗi,
        // Tức là thuộc tính error > 0
        if ($_FILES['avatar']['error'] > 0)
        {
            echo 'File Upload Bị Lỗi';
        }
        else{
            // Upload file
            move_uploaded_file($file_tmp, $location.$name);
            echo 'File Uploaded';


        }
    }
    else{
        echo 'Bạn chưa chọn file upload';
    }
}
?>