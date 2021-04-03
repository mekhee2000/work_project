<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    เพิ่ม Project Manager
</button>
<!-- <a href="f_insert_pm.php" class="btn btn-primary btn-lg">สร้าง Project Manager</a> -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม Project Manager</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="insert_pm.php" method="post">
                    <table class="table table-hover" style="width:100%">

                        <thead class=" text-primary">
                            <?php
                            $sql1 = " select * from tb_employee inner join tb_dep
                                                on tb_employee.dep_id = tb_dep.dep_id ";
                            $rs1 = $conn->query($sql1);
                            $r1 = $rs1->fetch_object();
                            $dep = $r1->dep_id;

                            ?>
                            <tr>
                                <th>ชื่อบัญชี : </th>
                                <td>
                                    <input type="text" name="em_user" class="form-control col-8">
                                </td>
                            </tr>
                            <tr>
                                <th>รหัสผ่าน : </th>
                                <td>
                                    <input type="password" name="em_pass" class="form-control col-8">
                                </td>
                            </tr>
                            <tr>
                                <th>ชื่อ-สกุล : </th>
                                <td>
                                    <input type="text" name="em_name" class="form-control col-8">
                                </td>
                            </tr>
                            <tr>
                                <th>เบอร์โทร : </th>
                                <td>
                                    <input type="text" name="em_tel" class="form-control col-8">
                                </td>
                            </tr>
                            <tr>
                                <th>อีเมล์ : </th>
                                <td>
                                    <input type="text" name="em_email" class="form-control col-8">

                                </td>
                            </tr>
                            <tr>
                                <th>ตำแหน่ง : </th>
                                <td>
                                    <select name="em_status" id="em_status" class="custom-select col-6">
                                        <option value="1" <?php if ($r1->em_status == "1") {
                                                                echo "selected";
                                                            } ?>>Project Manager</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>

                                <th>ฝ่ายงาน : </th>
                                <td>
                                    <!-- backup 
                                            <?php
                                            $sql_dep = "select * from tb_dep";
                                            $rs_dep = $conn->query($sql_dep);
                                            while ($r_dep = $rs_dep->fetch_object()) {

                                            ?>
                                                        <option value="<?= $r_dep->dep_id; ?>" <?php
                                                                                                if ($r_dep->dep_id == $c) {
                                                                                                    echo "selected";
                                                                                                }
                                                                                                ?>>
                                                            <?= $r_dep->dep_name ?>
                                                        </option>
                                                    <?php } ?> -->
                                    <select name="dep_id" id="dep_id" class="custom-select col-6">
                                        <?php
                                        $sql_dep = "select * from tb_employee inner join tb_dep
                                                on tb_employee.dep_id = tb_dep.dep_id ";
                                        $rs_dep = $conn->query($sql_dep);
                                        while ($r_dep = $rs_dep->fetch_object()) {
                                        ?>
                                            <option value="<?= $r_dep->dep_id; ?>" <?php
                                                                                    if ($r_dep->dep_id == $dep) {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>>
                                                <?= $r_dep->dep_name ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>

                            </tr>
                        </thead>
                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="submit" text-center text-primary class="btn btn-primary " value="เพิ่ม Project Manager">
            </div>
            </form>
        </div>
    </div>
</div>