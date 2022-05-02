<div class="modal fade " data-keyboard="false" data-backdrop="static" id="peditModal" tabindex="-1" role="dialog"
    aria-labelledby="peditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="peditModalLabel">Edit this Note</h5>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" onclick="reload()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/page/ledger/report.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="sno" id="snoEdit">
                    <div class="row">
                        <div class="mb-3 col-2">
                            <label for="title" class="form-label"> Machine no. :</label>
                            <select class="form-select" id="mmachineno" name="mmachineno" autofocus>
                                <?php
                
                            for ($i=1; $i <= 12  ; $i++) { 
                                echo '<option value="'. $i.'">'.$i.'</option>';
                            }

                        ?>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="title" class="form-label"> NAME :</label>
                            <select class="form-select" id="mname" name="mname" >
                                <?php
                            $sql = 'SELECT * FROM `account`';
                            $result = mysqli_query($conn,$sql);
                            $gst = '';
                            // $row = mysqli_fetch_array($result);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'. $row["name"].'">'.$row["name"].'</option>';
                            }

                        ?>
                            </select>
                        </div>
                        <div class="mb-3 col-4">
                            <label for="title" class="form-label">PRODUCTION :</label>
                            <input type="text" class="form-control" id="mproduction" name="mproduction"
                                aria-describedby="emailHelp">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="title" class="form-label"> duty :</label>
                            <select class="form-select" id="mduty" name="mduty" >
                                <option value="DAY">DAY</option>
                                <option value="NIGHT">NIGHT</option>

                            </select>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="title" class="form-label">FRAME :</label>
                            <input type="text" class="amount form-control" id="mframe" name="mframe">
                        </div>
                        <div class="mb-3 col-3">
                            <label for="title" class="form-label">T.B. :</label>
                            <input type="text" class="disc form-control " id="mtb" name="mtb"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-3">
                            <label for="title" class="form-label">Date :</label>
                            <input type="date" class="form-control" id="mdate" name="mdate"
                                value='<?php echo date('Y-m-d');?>'>
                        </div>
                    </div>


                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="reload()">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>