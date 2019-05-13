<?php
/**
 * Created by PhpStorm.
 * User: habac
 * Date: 06-May-19
 * Time: 2:27 PM
 */


$connect = mysqli_connect(
    'localhost', 'root', '', 'cnpmdatabase'
    )

or
die("Không thể kết nối database");
return $connect;


