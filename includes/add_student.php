
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
  width: 700px;
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
<div id="addModal" class="modal2">

  <!-- Modal content -->
  <div class="modal-content2">
    <span class="close2" onclick="exit()" >&times;</span>.
    <!-- -->
    <div class="header">
        <h1>Add Student</h1>
    </div>
    <div class="message">
    <table id="example" class="data list">
                <thead>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th></th>
                </thead>
                <?php
                // Adjusted SQL query to select students
                $squery = mysqli_query($conn, "SELECT * FROM student WHERE del_status != 'deleted' AND grade_level = '$grade' AND id NOT IN (SELECT student FROM section_student) ORDER BY grade_level;");
                while ($row = mysqli_fetch_array($squery)) {
                ?>
                <tr class="table-row">
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <span class="name"><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                    </td>
                    <td>
                        <a class="view" href="add_student.php?id=<?php echo $row['id']; ?>&quarter=<?php echo $quarter; ?>&section=<?php echo $section; ?>">
                        Add
                        </a>
                        <!-- Add more actions if needed -->
                    </td>
                </tr>
                <?php }?>
            </table>
            </div>
            <script>new DataTable('#example', {
    order: [[2, 'asc']]
});</script>
  
</div>
</div>
<script>
    function add() {
        document.getElementById("addModal").style.display = "block";
}

function exit() {
        document.getElementById("addModal").style.display = "none";
}

</script>
<!-- <script src="../../assets/js/modal_cam.js"></script> -->