<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang đăng lý</title>
    <link rel="stylesheet" type="text/css" href="Styles/Dangky.css">
</head>
<body>

<form action="signuphandle.php" method="POST">

    <input class="inputt" placeholder="Tên đăng nhập" type="text" name = "txtUsername" required="">
    <input class="inputt" placeholder="Mật khẩu" type="password" name = "txtPassword"  required="">
    <input class="inputt" placeholder="Repeat Password" type="password" required="">
    <input class="inputt" placeholder="Email" type="text" name = "txtEmail" required="">
    <input class="inputt" placeholder="Họ và Tên" type="text" name = "txtFullname" required="">
    <input class="inputt" placeholder="Số điện thoại" type="text" name = "txtPhonenumber" required="">
    <input class="inputt" placeholder="Ngày sinh" type="date" name = "txtBirthday" required="">

    <input class="chose" name="txtGender" type="radio" value="Nam" id="hoc" />Nam
    <input class="chose" name="txtGender" type="radio" value="Nữ" />Nữ

    <input class="chose" name="chucvu" type="radio" value="giaovien" id="hoc" />Giáo Viên
    <input class="chose" name="chucvu" type="radio" value="hocsinh" />Học Sinh

    <input type="submit" value="Đăng ký" />
    <input type="reset" value="Nhập lại" />
</form>
</body>
</html>