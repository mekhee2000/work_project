<?php
session_start();
ob_start();
include("./admin/connect_db.php");

$em_user = $_POST['em_user'];
$em_pass = $_POST['em_pass'];


$sql = "select * from tb_employee where em_user = '$em_user' and em_pass =  '$em_pass'";
$rs = $conn->query($sql);
$row = $row = mysqli_num_rows($rs);
$r = $rs->fetch_object();

if ($row > 0) {
    $_SESSION['em_user'] = $r->em_user;
    header("location:./employee/home.php");
} else {

    header("location:error1.php");
}
