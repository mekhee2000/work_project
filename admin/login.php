<?php
session_start();
ob_start();
include("connect_db.php");

$a_user = $_POST['a_user'];
$a_pass = $_POST['a_pass'];


$sql = "select * from tb_admin where a_user = '$a_user' and a_pass =  '$a_pass'";
$rs = $conn->query($sql);
$row = $row = mysqli_num_rows($rs);
$r = $rs->fetch_object();

if ($row > 0) {
    $_SESSION['a_user'] = $r->a_user;
    header("location:home.php");
} else {

    header("location:error1.php");
}
