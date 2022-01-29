            <!-- หน่วยงานคู่แข่ง -->
            <label for="">หน่วยงานคู่แข่ง</label>
            <a href="javascript:void(0)" onclick="add_element('mm1','smm1');" class=" float-end btn btn-success">เพิ่ม</a>
            <?php
            $mainid = $_REQUEST['main_id'];
            $sql2 = "SELECT * FROM dimen_agency WHERE main_id  = '$mainid' ";
            $query2 = sqlsrv_query($conn, $sql2);
            while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                <?php $agency =  $result2['agency_id']; ?>
                <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;">
                    <option value="">กรุณาเลือกหน่วยงานคู่แข่ง</option>
                    <?php $sql22 = "SELECT * FROM agency_tb";
                    $query22 = sqlsrv_query($conn, $sql22);
                    while ($result22 = sqlsrv_fetch_array($query22, SQLSRV_FETCH_ASSOC)) {
                        $agency2 =  $result22['agency_id'];
                        if ($agency == $agency2) {
                            $c = "selected";
                        } else {
                            $c = "";
                        } ?>
                        <option value="<?php echo $result22['agency_id'];  ?>" <?php echo $c; ?>><?php echo $result22['agency_name']; ?></option>
                    <?php } ?>
                    <input style="display:none;" type="text" name="id_dimension_agency[]" class="form-control" value="<?php echo $result2["id_dimension_agency"] ?>">
                </select>
            <?php } ?>
            <div class="main-form1 mt-3 " id="mm1">
                <div style="display:none;">
                    <div class=" mb-2 input-group mt-2" id="smm1">
                        <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;">
                            <option selected disabled>
                                กรุณาเลือกหน่วยงานคู่แข่ง</option>
                            <?php $sql2 = "SELECT * FROM agency_tb";
                            $query2 = sqlsrv_query($conn, $sql2);
                            while ($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                <option value="<?php echo $result['agency_id']; ?>">
                                    <?php echo $result['agency_name'];  ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" name="id_dimension_agency[]" class="form-control" id="id_dimension_agency">
                        <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบ</button>
                    </div>
                </div>
            </div>
            <!-- หน่วยงานคู่แข่ง -->


            <!-- หน่วยงานที่ขอ -->
            <label for="">หน่วยงานที่ขอ</label>
            <a href="javascript:void(0)" onclick="add_element('mm2','smm2');" class=" float-end btn btn-success">เพิ่ม</a>
            <?php
            $mainid = $_REQUEST['main_id'];
            $sql2 = "SELECT * FROM dimen_dep WHERE main_id  = '$mainid' ";
            $query2 = sqlsrv_query($conn, $sql2);
            while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                <?php $dep =  $result2['dep_id']; ?>
                <select class="form-control" name="dep_id[]" id="dep_id" style="height: unset !important;">
                    <option value="">กรุณาเลือกหน่วยงานที่ขอ</option>
                    <?php $sql22 = "SELECT * FROM dep_tb";
                    $query22 = sqlsrv_query($conn, $sql22);
                    while ($result22 = sqlsrv_fetch_array($query22, SQLSRV_FETCH_ASSOC)) {
                        $dep2 =  $result22['dep_id'];
                        if ($dep == $dep2) {
                            $c = "selected";
                        } else {
                            $c = "";
                        } ?>
                        <option value="<?php echo $result22['dep_id'];  ?>" <?php echo $c; ?>><?php echo $result22['dep_name']; ?></option>
                    <?php } ?>
                    <input style="display:none;" type="text" name="id_dimension_dep[]" class="form-control" value="<?php echo $result2["id_dimension_dep"] ?>">
                </select>
            <?php } ?>
            <div class="main-form1 mt-3 " id="mm2">
                <div style="display:none;">
                    <div class=" mb-2 input-group mt-2" id="smm2">
                        <select class="form-control" name="dep_id[]" id="dep_id" style="height: unset !important;">
                            <option selected disabled>
                                กรุณาเลือกหน่วยงานที่ขอ</option>
                            <?php $sql2 = "SELECT * FROM dep_tb";
                            $query2 = sqlsrv_query($conn, $sql2);
                            while ($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                <option value="<?php echo $result['dep_id']; ?>">
                                    <?php echo $result['dep_name'];  ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" name="id_dimension_dep[]" class="form-control" id="id_dimension_dep">
                        <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบ</button>
                    </div>
                </div>
            </div>
            <!-- หน่วยงานที่ขอ -->

            <!-- ประเภทมาตรฐาน -->
            <label for="">ประเภทมาตรฐาน</label>
            <a href="javascript:void(0)" onclick="add_element('mm3','smm3');" class=" float-end btn btn-success">เพิ่ม</a>
            <?php
            $mainid = $_REQUEST['main_id'];
            $sql2 = "SELECT * FROM dimen_type WHERE main_id  = '$mainid' ";
            $query2 = sqlsrv_query($conn, $sql2);
            while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                <?php $type =  $result2['type_id']; ?>
                <select class="form-control" name="type_id[]" id="type_id" style="height: unset !important;">
                    <option value="">กรุณาเลือกประเภทมาตรฐาน</option>
                    <?php $sql22 = "SELECT * FROM type_tb";
                    $query22 = sqlsrv_query($conn, $sql22);
                    while ($result22 = sqlsrv_fetch_array($query22, SQLSRV_FETCH_ASSOC)) {
                        $type2 =  $result22['type_id'];
                        if ($type == $type2) {
                            $c = "selected";
                        } else {
                            $c = "";
                        } ?>
                        <option value="<?php echo $result22['type_id'];  ?>" <?php echo $c; ?>><?php echo $result22['type_name']; ?></option>
                    <?php } ?>
                    <input style="display:none;" type="text" name="id_dimension_type[]" class="form-control" value="<?php echo $result2["id_dimension_type"] ?>">
                </select>
            <?php } ?>
            <div class="main-form1 mt-3 " id="mm3">
                <div style="display:none;">
                    <div class=" mb-2 input-group mt-2" id="smm3">
                        <select class="form-control" name="type_id[]" id="type_id" style="height: unset !important;">
                            <option selected disabled>
                                กรุณาเลือกประเภทมาตรฐาน</option>
                            <?php $sql2 = "SELECT * FROM type_tb";
                            $query2 = sqlsrv_query($conn, $sql2);
                            while ($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                <option value="<?php echo $result['type_id']; ?>">
                                    <?php echo $result['type_name'];  ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" name="id_dimension_type[]" class="form-control" id="id_dimension_type">
                        <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบ</button>
                    </div>
                </div>
            </div>
            <!-- ประเภทมาตรฐาน -->

            <!-- กลุ่มผลิตภัณฑ์ -->
            <label for="">กลุ่มผลิตภัณฑ์</label>
            <a href="javascript:void(0)" onclick="add_element('mm4','smm4');" class=" float-end btn btn-success">เพิ่ม</a>
            <?php
            $mainid = $_REQUEST['main_id'];
            $sql2 = "SELECT * FROM dimen_gg WHERE main_id  = '$mainid' ";
            $query2 = sqlsrv_query($conn, $sql2);
            while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                <?php $gg =  $result2['gg_id']; ?>
                <select class="form-control" name="gg_id[]" id="gg_id" style="height: unset !important;">
                    <option value="">กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                    <?php $sql22 = "SELECT * FROM gg_tb";
                    $query22 = sqlsrv_query($conn, $sql22);
                    while ($result22 = sqlsrv_fetch_array($query22, SQLSRV_FETCH_ASSOC)) {
                        $gg2 =  $result22['gg_id'];
                        if ($gg == $gg2) {
                            $c = "selected";
                        } else {
                            $c = "";
                        } ?>
                        <option value="<?php echo $result22['gg_id'];  ?>" <?php echo $c; ?>><?php echo $result22['gg_name']; ?></option>
                    <?php } ?>
                    <input style="display:none;" gg="text" name="id_dimension_gg[]" class="form-control" value="<?php echo $result2["id_dimension_gg"] ?>">
                </select>
            <?php } ?>
            <div class="main-form1 mt-3 " id="mm4">
                <div style="display:none;">
                    <div class=" mb-2 input-group mt-2" id="smm4">
                        <select class="form-control" name="gg_id[]" id="gg_id" style="height: unset !important;">
                            <option selected disabled>
                                กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                            <?php $sql2 = "SELECT * FROM gg_tb";
                            $query2 = sqlsrv_query($conn, $sql2);
                            while ($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                <option value="<?php echo $result['gg_id']; ?>">
                                    <?php echo $result['gg_name'];  ?></option>
                            <?php } ?>
                        </select>
                        <input gg="text" name="id_dimension_gg[]" class="form-control" id="id_dimension_gg">
                        <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบ</button>
                    </div>
                </div>
            </div>
            <!-- กลุ่มผลิตภัณฑ์ -->

            <!-- ไฟล์แนบ -->
            <label for="">ไฟล์แนบ</label>
            <a href="javascript:void(0)" onclick="add_element('mm6','smm6');" class=" float-end btn btn-success">เพิ่ม</a>
            <?php
            $mainid = $_REQUEST['main_id'];
            $sql5 = "SELECT * FROM dimen_file WHERE main_id  = '$mainid' ";
            $query5 = sqlsrv_query($conn, $sql5);
            while ($result5 = sqlsrv_fetch_array($query5, SQLSRV_FETCH_ASSOC)) { ?>
                <?php $file_id =  $result5['id_dimension_file'];
                $file_name =  $result5['fileupload']; ?>
                <input type="text" name="id_dimension_file[]" class="form-control" style="display:none;" value="<?php echo $file_id ?>">
                <input type="file" name="fileupload[]" class="form-control" value="<?php echo $file_name ?>">
            <?php } ?>
            <div class="main-form1 mt-3 " id="mm6">
                <div style="display:none;">
                    <div class="row" id="smm6">
                        <div class="">
                            <div class="form-group mb-2 input-group mt-3">
                                <input type="text" name="id_dimension_file[]" class="form-control" id="id_dimension_file">
                                <input type="file" class="form-control" name="fileupload[]" id="fileupload" style="height: unset !important;">
                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ไฟล์แนบ -->