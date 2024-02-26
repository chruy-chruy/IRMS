<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <title>Residents</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.1/css/buttons.dataTables.min.css">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.print.min.js"></script>



</head>

<body>
    <?php 
$page = 'Resident';
include "../../navbar.php";
include "../../db_conn.php";

 ?>
        <div class="content">
            <?php include "../../includes/alert.php"; ?>
            <div class="header">
                <h1>Export <?php if ($page) {echo $page;} ?></h1>
            </div>
            <div class="search-box">
            <a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
         </div>
            <div class="table_wrap">
            <table id="example" class="data list">
                <thead>
                    <th style="width: 50px;">ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Age</th>
                    <th>Civil Status</th>
                    <th>Purok</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>occupation</th>
                    <th>religion</th>
                </thead>
                <?php
        $squery =  mysqli_query($conn, "SELECT * from resident Where del_status != 'deleted' ORDER BY id DESC;");
         while ($row = mysqli_fetch_array($squery)) {
            
            $dob = new DateTime($row['date_of_birth']);
            $now = new DateTime();
            $difference = $now->diff($dob);
            $age = $difference->y;
        ?>
                <tr class="table-row">
                    <td><?php echo $row['id'] ?></td>
                    <td>
                        <span class="name"><?php echo $row['first_name'] . " " . $row['last_name'] ?></span>
                    </td>
                    <td>
                    <?php echo $row['gender'] ?>
                    </td>
                    <td>
                    <?php echo $row['date_of_birth'] ?>
                    </td>
                    <td>
                    <?php echo $age  ?>
                    </td>
                    <td>
                    <?php echo $row['civil_status'] ?>
                    </td>
                    <td>
                    <?php echo $row['purok'] ?>
                    </td>
                    <td>
                    <?php echo $row['phone_number'] ?>
                    </td>
                    <td>
                    <?php echo $row['email_address'] ?>
                    </td>
                    <td>
                    <?php echo $row['occupation'] ?>
                    </td>
                    <td>
                    <?php echo $row['religion'] ?>
                    </td>
                </tr>
                <?php }?>
            </table>
            </div>
    </div>
<script>$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip', // Add buttons to DOM
        buttons: [
            'copy', // Copy to clipboard
            'excel', // Export to Excel
            'pdf', // Export to PDF
            'print' // Print button
        ]
    });
});</script>

</body>

</html>