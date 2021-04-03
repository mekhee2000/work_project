<?php
     include("connect_db.php");
$em_user = @$_GET['em_user'];

     $sql = "delete from tb_employee where em_user = '$em_user'" ;
    //  echo $sql; exit();
     
     $rs = $conn->query($sql);
     if(!$rs){
         echo "ไม่สามารถลบข้อมูลได้";
     }else{
         header("location:employee.php");
     }
