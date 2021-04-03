<?php
include("connect_db.php");
$dp_id = @$_GET['dp_id'];

$sql = "delete from tb_pro_dep where dp_id = '$dp_id'";
//  echo $sql; exit();

$rs = $conn->query($sql);
if (!$rs) {
    echo "ไม่สามารถลบข้อมูลได้";
} else {
    header("location:project_dep.php");
}
