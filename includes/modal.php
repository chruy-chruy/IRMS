<style>
/* The Modal (background) */
.modal {
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
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 600px;
  height: 700px;
  border-radius: 10px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

#my_camera {
  width: 600px;
  height: 600px;
  margin-bottom: 5px;
}
.camera {
  margin-top: 15px;
}
  
.snapshot{
  background-color: #f2f2f2;
  padding: 10px;
  width: 250px;
  border-radius: 5px;
  cursor: pointer;
  border: 1px solid #799e7d;
}

.snapshot:hover{
  background-color: #799e7d;
  color: white;
}

</style>
 <button type="button" onclick="configure()" id="myBtn" ><i class="fa fa-camera fa-2x"></i></button>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>.
    <!-- -->
    <div class="camera">
    <div id="my_camera"></div>
    <input class="snapshot" type=button value="Snapshot" onClick="take_snapshot()">
    </div>
    <div id="results"></div>

    <!-- Script -->
    <script type="text/javascript" src="../../assets/js/webcam.min.js"></script>
  </div>

</div>

<script src="../../assets/js/modal.js"></script>