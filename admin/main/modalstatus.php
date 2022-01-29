<div class="modal" id="staticBackdrop<?php echo $data['main_id']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายการไฟล์ของหมายเลข <?php echo $data['main_id'] ; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?php 
               $mainid = $data['main_id'];
               $sql5 = "SELECT * FROM dimen_file WHERE main_id  = '$mainid' ";
               $query5 = sqlsrv_query($conn,$sql5);
               while ($result5 = sqlsrv_fetch_array($query5, SQLSRV_FETCH_ASSOC)) { ?>
                <a href='./main/fileupload/<?=$result5['fileupload'] ;?>'><?=$result5['fileupload'] ; ?>
                    <br>
                </a>
                <?php } ?>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
        </div>
    </div>
</div>