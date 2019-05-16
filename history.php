<?php

require_once 'connect.php';
include('functionlogin.php');
$username = $_SESSION['username'];

 $result = mysqli_query($connect,"select * from hs_diem where stUsername = '{$username}'");
 //echo mysqli_fetch_assoc($result);
//$row = mysqli_fetch_assoc($result);



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lịch sử làm bài</title>
<!--        <link href="css/bootstrap.min.css" rel="stylesheet">-->
<!--        <link href="css/style.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="Styles/index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
    </head>
    <body>
    <div class="topnav">

        <a href="stHome.php">Trang chủ</a>
        <a href="thongtincanhan.php" >Thông tin</a>
        <a href="doexam.php"  >Làm bài </a>
        <a href="history.php">Lịch sử làm bài</a>
        <a href="logout.php" >Đăng xuất </a>
        <!--        <p>Xin chào : Người Chơi </p>-->
    </div>
        <div id="container">
            <h1>Lịch sử làm bài</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <td>stUsername</td>
                        <td>examID</td>
                        <td>examName</td>
                        <td>score</td>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['stUsername']) ?></td>
                            <td><?php echo htmlspecialchars($row['examID']); ?></td>
                            <td><?php echo htmlspecialchars($row['examName']); ?></td>
                            <td><?php echo htmlspecialchars($row['score']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>