<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="google" value="notranslate" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">
    <title>IRMS-STUDENT</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome-4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
</head>
<body>
    <?php 
$page = 'Student';
include "../../navbar.php";
include "../../db_conn.php";

if (!isset($_GET['grade'])) {
    header("Location: ./");
    exit();
  } 
  $grade = $_GET['grade'];
 ?>
        <div class="content">
            <?php include "../../includes/alert.php"; ?>
            <div class="header">
                <h1><?php if ($page) {echo $page;} ?></h1>
            </div>
            
<a href="./" class="back"><i class="fa fa-arrow-circle-o-left fa-2x"></i></a>
            
            <div class="search-box">
    <a href="./add.php?grade=<?php echo $grade; ?>"><button>Add</button></a>
    <a href="javascript:printTable()"
       style="text-decoration: none; background: none; border: none; cursor: pointer; color:green;">
        <i class="fa fa-print fa-2x"></i>
    </a>
</div>
<script>
  function printTable() {
    var printContent = document.getElementById('example').outerHTML;

    // Remove the Action column from the print view
    printContent = printContent.replace(/<th class="text-end">Actions<\/th>/, ''); // Remove header column
    printContent = printContent.replace(/<td class="text-end">.*?<\/td>/g, ''); // Remove data cells in Action column

    var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Student List</title>');
    printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">');
    printWindow.document.write(`
      <style>
        body {
          font-family: Arial, sans-serif;
          margin: 20px;
        }
        h1 {
          text-align: center;
          font-size: 24px;
          margin-bottom: 20px;
        }
        table {
          width: 100%;
          border-collapse: collapse;
          margin-top: 10px;
        }
        th, td {
          border: 1px solid #000;
          padding: 8px;
          text-align: left;
        }
        th {
          background-color: #f2f2f2;
        }
        tr:nth-child(even) {
          background-color: #f9f9f9;
        }
        tr:hover {
          background-color: #f1f1f1;
        }
        @media print {
          #example th.text-end, #example td.text-end {
            display: none;
          }
        }
      </style>
    `);
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h1>Student List</h1>');  // Set the title as 'Student List'
    printWindow.document.write('<table class="table table-striped table-hover">' + printContent + '</table>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
  }
</script>


            <div class="table_wrap">
            <table id="example" class="data list">
                <thead>
                    <th style="width: 120px;">LRN Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Grade Level</th>
                    <th style="width: 55px;" class="text-end">Action</th>
                </thead>
                <?php
                // Adjusted SQL query to select students
                $squery = mysqli_query($conn, "SELECT * FROM student WHERE del_status != 'deleted' AND grade_level = '$grade' ORDER BY id desc;");
                while ($row = mysqli_fetch_array($squery)) {
                ?>
                <tr class="table-row">
                    <td><?php echo $row['lrn_number']; ?></td>
                    <td>
                        <div class="profile">
                        <span class="name"><?php echo $row['first_name'] . " " . $row['last_name']; ?></span>
                        </div>
                    </td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['grade_level']; ?></td>
                    <td class="text-end">
                        <a class="view" href="edit.php?id=<?php echo $row['id']; ?>">
                        View
                        </a>
                        <!-- Add more actions if needed -->
                    </td>
                </tr>
                <?php }?>
            </table>
            </div>
        </div>
<script>new DataTable('#example', {
    order: [[2, 'asc']]
    
});</script>

</body>

</html>
