<?php
    $conn = mysqli_connect("localhost","root","12345678","db_smart_office");
    if (!$conn) {
        echo "ไม่ได้";
    }else{
        // echo "ได้";
        mysqli_set_charset($conn,"utf8");
    }
?>