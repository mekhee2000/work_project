<?php
     include("../admin/connect_db.php");
    $pro_id = @$_GET['pro_id'];

     $sql = "delete from tb_project where pro_id = '$pro_id'" ;
    //  echo $sql; exit();
     
     $rs = $conn->query($sql);
     if(!$rs){
         echo "ไม่สามารถลบข้อมูลได้";
     }else{
         header("location:me_project.php");
     }
?>
