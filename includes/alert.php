<?php if(isset($_GET['message'])){ 
     $message = $_GET['message']; ?> 
    <div class="alert_message" id="hide"><?php echo $message; ?></div>
<?php } if(isset($_GET['error'])){
     $error = $_GET['error']; ?>
    <div class="alert_error" id="hide"><?php echo $error; ?></div>
<?php } ?>