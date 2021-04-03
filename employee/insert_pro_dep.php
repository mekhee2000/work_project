<?php
session_start();
ob_start();
$user = $_SESSION['em_user'];
include("../admin/connect_db.php");

$pro_id = $_POST['pro_id'];
$dp_dep = implode(",",$_POST['dp_dep']);


$sql = "insert into tb_pro_dep
            (dp_id ,pro_id,dp_dep)
            values('','$pro_id','$dp_dep')";
 //echo $sql;
$rs = $conn->query($sql);

if ($rs) {
?>
    <script language="javascript">
        alert("สร้างแผนกสำเร็จ!!!")
        location.href = "f_add_memproject.php?pro_id=<?= $pro_id ?>";
    </script>
<?php
} else {
    echo "ไม่สามารถสร้างแผนกได้";
    echo $sql;
    exit();
}
?>