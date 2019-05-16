<?php

  //Nhúng file kết nối với database
  include('connect.php');
  include('functionlogin.php');
  session_start();

  header('Content-Type: text/html; charset=UTF-8');

  $pos = $_SESSION['pos'];
  $username = $_SESSION['username'];
  $email      = addslashes($_POST['email']);
  $fullname   = addslashes($_POST['name']);
  $birthday   = ($_POST['dateofbirth']);
  $sex        = ($_POST['gender']);
  $phone      = addslashes($_POST['phonenumber']);
  
  $sql = "UPDATE `$pos` SET `fullName`='$fullname' WHERE `$pos`.`tcUsername`='$username'";
  $sql = "UPDATE `$pos` SET `email`='$email' WHERE `$pos`.`tcUsername`='$username'";
  $sql = "UPDATE `$pos` SET `gender`='$sex' WHERE `$pos`.`tcUsername`='$username'";
  $sql = "UPDATE `$pos` SET `Birthday`='$birthday' WHERE `$pos`.`tcUsername`='$username'";
  $sql = "UPDATE `$pos` SET `phonenumber` = '$phone' WHERE `$pos`.`tcUsername` = '$username'";

  if ($connect->query($sql) === TRUE) {
    echo "Record updated successfully";
    
} else {
    echo "Error updating record: " . $connect->error;
}

$connect->close();
?>
