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
                <a href="home.php" class="btn btn-primary">กลับ</a>&nbsp;&nbsp;&nbsp;&nbsp;
                
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
                            <div id="login-column" class="col-md-8">
                                <form id="login-form" class="form" action="add_project.php" method="post">
                                    <h1>สร้างโปรเจกต์</h1>
                                    <?php
                                    include("../admin/connect_db.php");
                                    $sql1 = "select * from tb_employee  where em_user = '$user'";
                                    $rs1 = $conn->query($sql1);
                                    $r1 = $rs1->fetch_object();
                                    //  echo $sql; exit();
                                    ?>
                                    <div class="form-group">
                                        <label for="text" class="text-color">ชื่อโปรเจกต์:</label><br>
                                        <input type="text" name="pro_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="text" class="text-color">รายละเอียด:</label><br>
                                        <input type="text" name="pro_detail" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="remember-me" class="text-color"></span></label><br>
                                        <input type="submit" name="submit" text-center text-info class="btn btn-success btn-md" value="สร้างโปรเจกต์">
                                        <input type="reset" name="reset" text-center text-info class="btn btn-danger btn-md" value="ยกเลิก">
                                    </div>
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