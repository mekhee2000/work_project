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
                $sql1 = "select * from tb_project";
                $rs1 = $conn->query($sql1);
                $r1 = $rs1->fetch_object();
                if ($r->em_status == '1') {
                ?>
                    <a href="f_add_project.php?em_user=<?= $r1->em_user ?>" class="btn btn-primary">สร้างหัวข้อ</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <?php }  ?>
                <?php
                if ($r->em_status == '1') {
                ?>
                    <a href="f_add_pro_dep.php?pro_id=<?= $r1->pro_id ?>" class="btn btn-primary">จัดการผู้เข้าร่วมโปเจกต์</a>
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
                    <div id="login-column" class="col-md-12">
                        <div id="login-box" class="col-md-12">

                            <?php
                            $pro_id = $_GET['pro_id'];
                            $sql1 = "select * from tb_project where pro_id = '$pro_id'";
                            $rs1 = $conn->query($sql1);
                            $r1 = $rs1->fetch_object()
                            ?>
                            <h1>ยินดีต้อรับเข้าสู่ <p></p> โปรเจกต์ : <?= $r1->pro_name ?></h1>

                            <form id="login-form" class="form" action="add_memproject.php" method="post">
                                <h3 class="text-center text-color">เพิ่มผู้เข้าร่วมโปรเจกต์</h3>
                                <table id="table" class="table table-hover" style="width:100%">
                                    <thead class=" text-primary">
                                        <th>No.</th>
                                        <th>รหัสผู้เข้าร่วมใโปรเจกต์</th>
                                        <th>รหัสโปรเจกต์</th>
                                        <th>ชื่อบัญชีผู้เข้าร่วม</th>
                                        <th>ฝ่ายงาน</th>
                                        <th>Manage</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $pro_id = $_GET['pro_id'];
                                        $no = 1;
                                        // echo $pro_id; exit();
                                        //2. query ข้อมูลจากตาราง:
                                        $sqld = "SELECT * FROM tb_projectmember WHERE pro_id='$pro_id' ";
                                        //  echo $sqld; exit();
                                        $resultd = $conn->query($sqld);
                                        $rowd = $resultd->fetch_object();
                                        $em_user = $rowd->em_user;
                                        // $arraccept = array("รองเท้า", "กระเป๋า", "ของใช้ในบ้าน", "เครื่องสำอาง", "เสื้อผ้า", "อาหาร", "อุปกรณ์ไอที", "เครื่องประดับ", "หนังสือ", "เครื่องใช้ไฟฟ้า");
                                        $dbuser = explode(",", $em_user);
                                        //echo $dp_dep; exit();
                                        $sqlc = "SELECT * FROM tb_employee";
                                        $resultc = $conn->query($sqlc);
                                        while ($rowc = $resultc->fetch_object()) {
                                            $a = $rowc->em_user;
                                            //echo $a; 
                                            //foreach ($arraccept as $a) {

                                            if (in_array($a, $dbuser)) {
                                                $sql_sh = "select * from tb_employee 
                                                    inner join tb_dep
                                                    on tb_employee.dep_id = tb_dep.dep_id 
                                                    where tb_employee.em_user = '$a'";
                                                $rs_sh = $conn->query($sql_sh);
                                                $r_sh = $rs_sh->fetch_object();
                                                // echo '<b>' . $r_sh->dep_name . '</b>';
                                                // $sql_shm1 = "select * from tb_employee where dep_id = '$a'";
                                                $rs_shm = $conn->query($sql_sh);
                                                while ($r_shm = $rs_shm->fetch_object()) {


                                        ?>
                                                    <tr>
                                                        <td>
                                                            <?= $no++ ?>
                                                        </td>
                                                        <td>
                                                            <?= $rowd->pm_id ?>
                                                        </td>
                                                        <td>
                                                            <?= $rowd->pro_id ?>
                                                        </td>
                                                        <td>
                                                            <?= $r_shm->em_user ?>
                                                        </td>
                                                        <td>
                                                            <?= $r_shm->dep_name ?>
                                                        </td>
                                                        <td>
                                                            <i class="fas fa-briefcase">
                                                                <input name="btnSubmit" class="btn btn-warning" type="submit" value="จัดการ"></i>
                                                            <input name="pro_id" type="hidden" value="<?= $pro_id ?>">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                                        </td>
                                                    </tr>

                                            <?php
                                                }
                                            }
                                            ?>

                                            <p>
                                            <?php
                                        }
                                            ?>

                                    </tbody>
                                </table>
                            </form>

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