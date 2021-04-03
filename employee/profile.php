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

    <title>Simple Sidebar - Start Bootstrap Template</title>

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

            <div class="container-fluid">
                <div class="col-auto">
                    <table class="table table-hover" align="center">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <h1 class="mt-4">ข้อมูลผู้ใช้</h1>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../admin/connect_db.php');
                            $sql = "select * from tb_employee  where em_user = '$user'";
                            $rs = $conn->query($sql);
                            $r = $rs->fetch_object();
                            ?>
                            <tr>
                                <td>ชื่อบัญชี</td>
                                <td><?= $r->em_user ?></td>
                            </tr>
                            <tr>
                                <td>รหัส</td>
                                <td><?= $r->em_user ?></td>
                            </tr>
                            <tr>
                                <td>ชื่อ-สกุล</td>
                                <td><?= $r->em_user ?></td>
                            </tr>
                            <tr>
                                <td>เบอร์โทร</td>
                                <td><?= $r->em_tel ?></td>
                            </tr>
                            <tr>
                                <td>อีเมล์</td>
                                <td><?= $r->em_email ?></td>
                            </tr>
                            <tr>
                                <td>ตำแหน่ง</td>
                                <td><?= $r->em_status ?></td>
                            </tr>
                            <tr>
                                <td>ฝ่ายงาน</td>
                                <td><?= $r->dep_id ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="f_update_profile.php" class="btn btn-primary">แก้ไขข้อมูล</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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