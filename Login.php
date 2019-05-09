<!DOCTYPE html>


<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="Styles/login.css">
</head>
<body>
    <form action='login.php?do=login' method='POST'>
        <h1>Đăng Nhập </h1>
        <input class="inputt"  placeholder="Email or Username" type='text' name="txtUser" required="">
        <input class="inputt" placeholder="Mật khẩu" type="password" name="txtPassword" required="">
        <div>
            <input class="pos" name="position" type="radio" value="giaovien" id="hoc" />Giáo Viên
            <input class="pos" name="position" type="radio" value="hocsinh" />Học Sinh

        </div>

        <u>
            <a href='signup.php' title='Đăng ký'>Đăng ký</a>
        </u>

        <input class="submit" type='submit' name="dangnhap" value='Đăng nhập' />
<!--        <button onclick="submit">Đăng nhập</button>-->
    </form>
</body>
</html>
<?php

session_start();


header('Content-Type: text/html; charset=UTF-8');

//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{

    include('connect.php');


    $username = addslashes($_POST['txtUser']);
    $password = ($_POST['txtPassword']);
    $pos      = ($_POST['position']);
//    $email    = ($_POST['txtUser']);


    if (!$username || !$password || !$pos) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }


    $password = md5($password);
    if ($pos== 'hocsinh'){
        $query = mysqli_query($connect,"SELECT stUsername, password FROM hocsinh WHERE stUsername='$username'");

        if (mysqli_num_rows($query) == 0  ) {
            echo "Tài khoản này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }


        $row = mysqli_fetch_array($query,MYSQLI_NUM);



        if ($password != $row[1]   ) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }


        $_SESSION['username'] = $username;
        echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='stHome.php'>Về trang chủ</a>";
        die();
    }
    elseif ($pos ="giaovien"){
        $query2 = mysqli_query($connect,"SELECT tcUsername, password FROM giaovien WHERE tcUsername='$username'");

        if (mysqli_num_rows($query2) == 0  ) {
            echo "Tài khoản này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }


        $row = mysqli_fetch_array($query2,MYSQLI_NUM);



        if ($password != $row[1]   ) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }

        //Lưu tên đăng nhập
        $_SESSION['username'] = $username;
        echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='tcHome.php'>Về trang chủ</a>";
        die();
    }



}
?>