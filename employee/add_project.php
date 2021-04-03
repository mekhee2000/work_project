<?php
session_start();
ob_start();
$user = @$_SESSION['em_user'];
include("../admin/connect_db.php");
$pro_id  = $_POST['pro_id '];
$pro_name = $_POST['pro_name'];
$pro_date = $_POST['pro_date'];
$pro_detail = $_POST['pro_detail'];


$sql = "insert into tb_project
            (pro_id ,pro_name,em_user,pro_detail)
            values('$pro_id','$pro_name','$user','$pro_detail')";
// echo $sql;
$rs = $conn->query($sql);

if ($rs) {
?>
    <script language="javascript">
        alert("สร้างโปรเจกต์สำเร็จ!!!")
        location.href = "me_project.php";
    </script>
<?php
} else {
    echo "ไม่สามารถสมัครสมาชิกได้";
    echo $sql;
    exit();
}
?>