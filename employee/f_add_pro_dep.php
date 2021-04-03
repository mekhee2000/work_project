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
                <a href="me_project.php" class="btn btn-primary">กลับ</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <h3 class="text-center text-color">เพิ่มแผนกที่เกี่ยวข้อง</h3>

                <!-- <?php
                        if ($r->em_status == '1') {
                        ?>
                    <a href="f_add_project.php" class="btn btn-primary">สร้างหัวข้อ</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php }  ?>
                <?php
                if ($r->em_status == '1') {
                ?>
                    <a href="f_add_memproject.php" class="btn btn-primary">เพิ่มผู้ร่วมโปรเจกต์</a>
                <?php }  ?> -->
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
                <div id="login-row" class="row justify-content-right align-items-right">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <div id="login-column" class="col-md-10">
                                <form action="insert_pro_dep.php" method="post" name="form1">
                                    <?php
                                    $pro_id = $_GET['pro_id'];
                                    $sql1 = "select * from  tb_dep ";
                                    $rs1 = $conn->query($sql1);
                                    while ($r1 = $rs1->fetch_object()) {
                                    ?>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="dp_dep[]" value="<?= $r1->dep_id ?>" aria-label="Checkbox for following text input">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $r1->dep_name ?>" readonly>
                                        </div>
                                    <?php } ?>
                                    <input name="btnSubmit" class="btn btn-info" type="submit" value="เพิ่ม">
                                    <input name="pro_id" class="btn btn-info" type="hidden" value="<?= $pro_id ?>">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input name="btnSubmit" class="btn btn-danger" type="reset" value="ยกเลิก">
                                </form>
                            </div>

                        </div>
                    </div>
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