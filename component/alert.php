<?php
$errormsg = "";
if ($insert) {
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Inserted  failed!</strong> '.$errormsg.'
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}
if ($update) {
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>updated failed!</strong> '.$errormsg.'
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}
if ($delete) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>delete record !</strong> '.$errormsg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>
