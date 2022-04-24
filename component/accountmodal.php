<!-- Modal -->
<?php

echo '
<div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountModalLabel">Account Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="reload()"></button>
            </div>
            <form action="/employee/page/master/account.php" method="post">
                <div class="modal-body">
                    <div class="container">
                        <div class="mb-3">
                            <label  class="form-label">Name :</label>
                            <input type="text" class="form-control" placeholder="Enter employee name"
                                id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Adhar No:</label>
                            <input type="text" class="form-control" placeholder="Enter Adhar No"
                                id="adharno" name="adharno" maxlength="15" 
                                style="text-transform:uppercase">
                        </div>
                       
                       
                        <div class="mb-3">
                            <label for="title" class="form-label"> Category :</label>
                            <select class="form-select" id="category" name="category" >
                            <option value="KARIGAR">KARIGAR</option>
                            <option value="SUPERVISOR">SUPERVISOR</option>
                            <option value="DHAGACUTING">DHAGACUTING</option>
                            </select>
                        </div>
                     
                        
                        <div class="mb-3">
                            <label  class="form-label">Mobile:</label>
                            <input type="text" class="form-control" placeholder="Enter mobile No"
                                id="mobile" name="mobile" maxlength="15" 
                                style="text-transform:uppercase">
                                <input type="hidden" name="sno">
                        </div>
                        

                    </div>

                </div>                  
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  onclick="reload()" >Close</button>
                    <button type="submit" class="btn btn-primary" id="account" name="account" >Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
';


?>