<?php
session_start();
ob_start();
$user = @$_SESSION['em_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>home</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
    <?php
    if ($user == '') {
        header("location:../error1.php");
        exit();
    }
    include("../admin/connect_db.php");
    $sql = "select * from tb_employee  where em_user = '$user'";
    $rs = $conn->query($sql);
    $r = $rs->fetch_object();
    //  echo $sql; exit();
    ?>
    <div class="d-flex" id="wrapper">

        <?php
        include("../sidebar.php");
        ?>


        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <h1>โปรเจ็กต์ของฉัน</h1>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">

                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="home.php">
                                <img src="../src/001.png" alt="" width="170" height="70">
                                <span class="sr-only">(current)</span></a>
                        </li>

                    </ul>
                </div>
            </nav>
            <br>

            <div class="container">


                <div class="row">
                    <?php
                    $sql1 = "select * from  tb_project where em_user = '$user' ";
                    $rs1 = $conn->query($sql1);
                    while ($r1 = $rs1->fetch_object()) {
                    ?>
                    <div class="col-4">
                        <div class="card" style="margin-left:auto; height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title">ชื่อโปรเจ็กต์ : <?= $r1->pro_name ?></h5>
                                <h5 class="card-title">รายละเอียด : <?= $r1->pro_detail ?></h5>

                                <?php
                                    if ($r->em_user == $r1->em_user) {
                                    ?>
                                <center><a href="f_add_pro_dep.php?pro_id=<?= $r1->pro_id ?>" class="btn btn-primary"
                                        style="margin-top: 50px;">
                                        เพิ่มแผนกที่เกี่ยวข้อง </a></center>
                                <p></p>
                                <div>
                                    <a href="project.php?pro_id=<?= $r1->pro_id ?>" class="btn btn-success"> เข้า </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <a href="f_proname_update.php?pro_id=<?= $r1->pro_id ?>" class="btn btn-warning">
                                        แก้ไข </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="delete_project.php?pro_id=<?= $r1->pro_id ?>" class="btn btn-danger"> ลบ
                                    </a>
                                </div>
                                <?php
                                    } else {
                                    ?>
                                ไม่ได้เข้าร่วม
                                <?php
                                    }
                                    ?>
                            </div>
                        </div><br>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>