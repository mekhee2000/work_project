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
                <?php
                if ($r->em_status == '1') {
                ?>
                    <a href="f_add_project.php" class="btn btn-primary">สร้างหัวข้อ</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php }  ?>
                <?php
                if ($r->em_status == '1') {
                ?>
                    <a href="f_add_memproject.php" class="btn btn-primary">เพิ่มผู้ร่วมโปรเจกต์</a>
                <?php }  ?>
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
                            <div id="login-column" class="col-md-12">
                                <form id="login-form" class="form" action="add_memproject.php" method="post">
                                    <h3 class="text-center text-color">เพิ่มผู้เข้าร่วมโปรเจกต์</h3>
                                    <?php
                                    $pro_id = $_GET['pro_id'];
                                    // echo $pro_id; exit();
                                    //2. query ข้อมูลจากตาราง:
                                    $sqld = "SELECT * FROM tb_pro_dep WHERE pro_id='$pro_id' ";
                                    //  echo $sqld; exit();
                                    $resultd = $conn->query($sqld);
                                    $rowd = $resultd->fetch_object();
                                    $dp_dep = $rowd->dp_dep;
                                    // $arraccept = array("รองเท้า", "กระเป๋า", "ของใช้ในบ้าน", "เครื่องสำอาง", "เสื้อผ้า", "อาหาร", "อุปกรณ์ไอที", "เครื่องประดับ", "หนังสือ", "เครื่องใช้ไฟฟ้า");
                                    $dbdep = explode(",", $dp_dep);
                                    //echo $dp_dep; exit();
                                    $sqlc = "SELECT * FROM tb_dep";
                                    $resultc = $conn->query($sqlc);
                                    while ($rowc = $resultc->fetch_object()) {
                                        $a = $rowc->dep_id;
                                        //echo $a; 
                                        //foreach ($arraccept as $a) {
                                        if (in_array($a, $dbdep)) {
                                            $sql_sh = "select * from tb_dep where dep_id = '$a'";
                                            $rs_sh = $conn->query($sql_sh);
                                            $r_sh = $rs_sh->fetch_object();
                                            echo '<b>' . $r_sh->dep_name . '</b>';
                                            $sql_shm = "select * from tb_employee where dep_id = '$a'";
                                            $rs_shm = $conn->query($sql_shm);
                                            while ($r_shm = $rs_shm->fetch_object()) {
                                                
                                                ?>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="checkbox" name="em_user[]" value="<?= $r_shm->em_user; ?>" aria-label="Checkbox for following text input">
                                                
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Text input with checkbox" value="<?= $r_shm->em_user; ?>" readonly>
                                                </div>
                                        <?php
                                                
                                            }
                                        }
                                        ?>

                                        <p>
                                        <?php
                                    }
                                        ?>

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