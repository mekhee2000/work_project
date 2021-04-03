<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Register Employee</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- CSS -->
    <link rel="stylesheet" href="css/register.css">



</head>

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="register.php" method="post">
                            <h4 class="text-center text-color">Register Employee</h4>
                            <div class="form-group">
                                <label for="username" class="text-color">Username:</label>
                                <input type="text" name="em_user" class="form-control" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-color">Password:</label><br>
                                <input type="password" name="em_pass" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-color">Name:</label><br>
                                <input type="text" name="em_name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-color">Tel:</label><br>
                                <input type="text" name="em_tel" class="form-control" placeholder="Enter Call Number">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-color">Email:</label><br>
                                <input type="text" name="em_email" class="form-control" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-color">Status:</label><br>
                                <select class="form-select" name="dep_id" id="dep_id" aria-label="Default select example"><br>
                                    <?php
                                    include("./admin/connect_db.php");
                                    $sql1 = "select * from tb_dep";
                                    $rs1 = $conn->query($sql1);
                                    while ($r1 = $rs1->fetch_object()) {
                                    ?>
                                        <option value="<?= $r1->dep_id ?>"><?= $r1->dep_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group ">
                                <input type="submit" name="submit" text-center text-info class="btn btn-info btn-md " value="สมัคร">

                                <input type="reset" name="reset" text-center text-info class="btn btn-info btn-md" value="ยกเลิก">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>

</html>