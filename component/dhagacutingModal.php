<!-- Modal -->
<?php

echo '
<div class="modal fade" id="dhagacutingModal" tabindex="-1" aria-labelledby="dhagacutingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dhagacutingModalLabel">dhagacuting Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="reload()"></button>
            </div>
            <form action="/page/transaction/adddhagacuting.php" method="post">
                <div class="modal-body">
                    <div class="container">
                        <div class="mb-3">
                            <label for="title" class="form-label">Name :</label>
                            <select class="form-select" id="name" name="name" autofocus>
                            ';
                            
                            $sql = 'SELECT * FROM `account` where category="DHAGACUTING"';
                            $result = mysqli_query($conn,$sql);
                            $gst = '';
                            // $row = mysqli_fetch_array($result);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'. $row["name"].'">'.$row["name"].'</option>';
                            }
                    
                    echo '</select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Saree/Meter:</label>
                            <input type="text" class="form-control" placeholder="Enter Saree"
                                id="saree" name="saree">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Price:</label>
                            <input type="text" class="form-control" 
                                id="price" name="price" value="3">
                        </div>                            
                        <div class="mb-3">
                            <label for="title" class="form-label">Date :</label>
                            <input type="date" class="form-control" id="date" name="date" value=';
                            echo date('Y-m-d');
                            echo '>
                            <input type="hidden" name="sno">

                        </div>
                    </div>
                </div>                  
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  onclick="reload()" >Close</button>
                    <button type="submit" class="btn btn-primary" id="dhagacuting" name="dhagacuting" >Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
';


?>