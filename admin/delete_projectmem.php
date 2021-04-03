<?php
include("connect_db.php");
$pm_id = @$_GET['pm_id'];

$sql = "delete from tb_projectmember where pm_id = '$pm_id'";
//  echo $sql; exit();

$rs = $conn->query($sql);
if (!$rs) {
    echo "ไม่สามารถลบข้อมูลได้";
} else {
    header("location:project_mem.php");
}
