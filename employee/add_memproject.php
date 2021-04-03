<?php
session_start();
ob_start();
$user = $_SESSION['em_user'];
include("../admin/connect_db.php");

$pro_id = $_POST['pro_id'];
$em_user = implode(",",$_POST['em_user']);



$sql_in = "insert into tb_projectmember
                (pm_id,pro_id,em_user)
                values('','$pro_id','$em_user')";

$rs = $conn->query($sql_in);

if ($rs) {
?>
    <script language="javascript">
        alert("เพิ่มสมาชิกลงในโปรเจ็กต์สำเร็จแล้ว!!!")
        location.href = "project.php?pro_id=<?= $pro_id ?>";
    </script>
<?php
} else {
    echo "ไม่สามารถเพิ่มสมาชิกลงในโปรเจ็กต์ได้ครับ";
    echo $sql;
    exit();
}
?>