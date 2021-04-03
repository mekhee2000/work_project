<?php

include("./admin/connect_db.php");
$em_user = $_POST['em_user'];
$em_pass = $_POST['em_pass'];
$em_name = $_POST['em_name'];
$em_tel = $_POST['em_tel'];
$em_email = $_POST['em_email'];
//$em_status = $_POST['em_status'];
$dep_id = $_POST['dep_id'];
//echo $dep_id; exit();

$sql = "insert into tb_employee
            (em_user,em_pass,em_name,em_tel,em_email,dep_id)
            values('$em_user','$em_pass','$em_name','$em_tel','$em_email','$dep_id')";
// echo $sql;
$rs = $conn->query($sql);

if ($rs) {
    
    if ($dep_id == '1') {
        $sql1 = "update tb_employee
            set em_status = '1'
            where em_user = '$em_user'
            ";
        //    echo $sql1; exit();
        $rs1 = $conn->query($sql1);
    }
    else{
        $sql2 = "update tb_employee
            set em_status = '3'
            where em_user = '$em_user'
            ";
        $rs2 = $conn->query($sql2);
    }
?>
   
    <script language="javascript">
        alert("สมัครสมาชิกสำเร็จ กรุณาไปหน้าล็อกอิน")
        location.href = "index.php";
    </script>
<?php
} else {
    echo "ไม่สามารถสมัครสมาชิกได้";
    echo $sql;
    exit();
}
?>