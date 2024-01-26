
<style>
/* The Modal (background) */
.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content2 {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 400px;
  height: 240px;
  border-radius: 10px;
}

/* The Close Button */
.close2 {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.message {
    padding:10px;
    font-size: 20px;
    margin-bottom: 20px;
}

</style>

 <!-- <button type="button" id="delBtn" onclick="del()" >asdas</button> -->
<!-- The Modal -->
<div id="delModal" class="modal2">

  <!-- Modal content -->
  <div class="modal-content2">
    <span class="close2" onclick="exit()" >&times;</span>.
    <!-- -->
    <div class="header">
        <h1>Delete Resident</h1>
    </div>
    <div class="message">
       Are you sure want to delete resident <br>
       <div style ="color: red;"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></div>
    </div>
  
<a href="delete.php?id=<?php echo $row['id']; ?>"><button type="button" class="confirm">Confirm</button></a>
<button class="cancel" type="button" onclick="exit()">Cancel</button>
</div>
</div>
<script>
    function del() {
        document.getElementById("delModal").style.display = "block";
}

function exit() {
        document.getElementById("delModal").style.display = "none";
}

</script>
<!-- <script src="../../assets/js/modal_cam.js"></script> -->