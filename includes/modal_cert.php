
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
  height: 500px;
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
    font-size: 14px;
    margin-bottom: 20px;
}

.cert_table_wrap{
    overflow: auto;
    height: 400px;
    margin-bottom: 20px;
    width: 100%;
}
</style>

 <!-- <button type="button" id="delBtn" onclick="del()" >asdas</button> -->
<!-- The Modal -->
<div id="certModal" class="modal2">

  <!-- Modal content -->
  <div class="modal-content2">
    <span class="close2" onclick="exit()" >&times;</span>
    <!-- -->
    <div class="header">
        <h2>Generate Certificate</h2>
    </div>
    <div class="message">
      <div class="cert_table_wrap">
      <table id="example2" class="data list">
                <thead>
                    <th style="width: 50px;">ID</th>
                    <th>Name</th>
                    <th style="width: 55px;">Action</th>
                </thead>
                <?php
        $squery =  mysqli_query($conn, "SELECT * from resident Where del_status != 'deleted'");
         while ($row = mysqli_fetch_array($squery)) {
        ?>
                <tr class="table-row">
                    <td><?php echo $row['id'] ?></td>
                    <td>
                        <div class="profile">
                        <img src="../../uploads/<?php echo $row['image'] ?>" alt="">
                        <span class="name"><?php echo $row['first_name'] . " " . $row['last_name'] ?></span>
                        </div>
                    </td>
                    <td>
                        <a class="view" href="generate.php?id=<?php echo $row['id'] ?>">
                        select
                        </a>
                    </td>
                </tr>
                <?php }?>
            </table>
         </div>
    </div>
</div>
</div>
<script>
    function generate() {
        document.getElementById("certModal").style.display = "block";
}

function exit() {
        document.getElementById("certModal").style.display = "none";
}

</script>
<!-- <script src="../../assets/js/modal_cam.js"></script> -->