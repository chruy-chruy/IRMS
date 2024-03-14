<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .certificate {
            max-width: 8.5in;
            /* Legal page width */
            margin: 10px auto;
            border-radius: 10px;
            background-color: #ffffff;
            border: solid 3px #718f7460;
        }

        .certificate-header {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .certificate-header .logo1 {
            max-width: 150px;
            margin-right: 120px;
        }

        .certificate-header .logo2 {
            max-width: 150px;
            margin-left: 120px;
        }

        .certificate label {
            text-align: center;
        }

        .certificate p {
            margin-bottom: 10px;
        }

        .grid-item1 {
            padding-top: 20px;
            top: 0;
            bottom: 0;
            height: 790px;
            left: 0;
            width: 250px;
            overflow: hidden;
            border: solid 3px #000;
            text-align: center;
        }

        .grid-item2 {
            margin-left: 10px;
        }

        .grid-item3 {
            font-size: 12px;
            text-align: center;
        }

        .grid-item4 {
            font-size: 12px;
            text-align: center;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            padding: 10px;
        }

        .buttons{
            margin-top: 37%;
            margin-left: 47%;
            position:fixed;
        }
        .buttons .print{
            width: 100px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size:16px;
            box-shadow: 0 3px 5px #999;
        }
        .buttons .back{
            width: 100px;
            padding: 10px;
            color: #4b4848;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-weight: bold;
            font-size:16px;
            box-shadow: 0 3px 5px #999;
        }
        .back:hover {
           background-color: #FAFAFA;
        }

        .print:hover {
            background-color: #45a049;
        }
        @media print {
        .print{
                display:none;
        }
        .back{
                display:none;
        }
        .certificate {
            max-width: 8.5in;
            /* Legal page width */
            margin: 10px auto;
            border-radius: 10px;
            background-color: #ffffff;
            border: none;
        }
        @page {
            margin: 0.3in 1in 0.3in 1in !important
        }
        }
    </style>
</head>

<body>
<?php 
$page = 'Certificate';
include "../../db_conn.php";
$id = $_GET['id'];
$print = $_GET['print'];
$purpose = $_POST['purpose'];
$date_issued = $_POST['date_issued'];
$date = date_create($date_issued);
$format_date = date_format($date,"jS \d\a\y \of F\, Y");

$squery =  mysqli_query($conn, "SELECT * from resident Where id = '$id'");
while ($row = mysqli_fetch_array($squery)) {
    $gender;
    if($row['gender'] == "Female" &&  $row['civil_status'] == "single"){
        $gender = "Ms.";
    }elseif($row['gender'] == "Female" &&  $row['civil_status'] == "married"){
        $gender = "Mrs.";
    }else{
        $gender = "Mr.";
    }

    $middle_name = $row['middle_name'];
    $get_initial = substr($middle_name, 0, 1);
    if($middle_name == ""){
        $middle_initial = "";
    }else{
        $middle_initial = $get_initial.".";
    }
 ?>

    <div class="certificate">
        <div class="certificate-header">
            <img class="logo1" src="../../assets/img/republic.png" alt="Barangay Logo">
            <label>
                <span
                    style="font-size: 13px; font-family: Copperplate,Copperplate Gothic Light,fantasy; color: black;">Republic
                    of the Philippines</span>
                <br>
                <p style="font-family: Arial; font-size: 11px;  margin: 0;">Province of
                    Sarangani
                </p>
                <p style="font-family: Arial; font-size: 11px;  margin: 0;">
                    Municipality of Malungon
                </p>
                <span style="font-size:14px; font-family: Copperplate, 'Copperplate Gothic Light', fantasy;">
                    Barangay of Alkikan</span>
                <br>
                <br>
            </label>
            <img class="logo2" src="../../assets/img/malungon.png" alt="Barangay Logo">
        </div>
        <span
            style="font-size:18px; font-family: Algerian; font-weight:bold; display: flex;align-items: center; justify-content: center; margin-bottom: 0;">
            OFFICE OF THE PUNONG BARANGAY</span>
        <hr style="height:3px;border:none;color:#333;background-color:#333; margin-top: 0;">

        <div class="grid-container">
            <div class="grid-item1">
                <hr
                    style="height:4px;border:none;background-color:rgb(82, 11, 11); margin-left: 10px; margin-right: 10px; margin-bottom: 0;">
                <span style=" font-size: 11px; color:blue">LIST OF BRGY. OFFICIAL OF ALKIKAN</span>
                <br>
                <br>
                <span style="font-size:14px; font-weight: bold; margin-bottom: 0;">HON. NILO H. ARELLANO</span>
                <hr
                    style="height:4px;border:none;background-color:#141414; margin-left: 10px; margin-right: 10px; margin: 0;">
                <span style="font-size: 11px;">PUNONG BARANGAY</span>

                <br>
                <br>
                <span style="font-size:12px; font-weight: bold; margin-bottom: 0; text-decoration: underline">HON.
                    JEALOUS GUY M. YANAN</span>
                <br>
                <span style="font-size: 11px;">Barangay Council</span>
                <br>
                <br>
                <span style="font-size:12px; font-weight: bold; margin-bottom: 0; text-decoration: underline">
                    HON. JEAMARIE R. DELA CRUZ </span>
                <br>
                <span style="font-size: 11px;">Barangay Council</span>
                <br>
                <br>
                <span style="font-size:12px; font-weight: bold; margin-bottom: 0; text-decoration: underline">
                    HON. MARCELINO D. HERMAN</span>
                <br>
                <span style="font-size: 11px;">Barangay Council</span>
                <br>
                <br>
                <span style="font-size:12px; font-weight: bold; margin-bottom: 0; text-decoration: underline">HON.
                    MARCELA L. TAGOY</span>
                <br>
                <span style="font-size: 11px;">Barangay Council</span>
                <br>
                <br>
                <span style="font-size:12px; font-weight: bold; margin-bottom: 0; text-decoration: underline">HON.
                    JOYLYN S. BUAN </span>
                <br>
                <span style="font-size: 11px;">Barangay Council</span>
                <br>
                <br>
                <span style="font-size:12px; font-weight: bold; margin-bottom: 0; text-decoration: underline">HON. ELSON
                    H. BERTOLANO </span>
                <br>
                <span style="font-size: 11px;">Barangay Council</span>
                <br>
                <br>
                <span style="font-size:12px; font-weight: bold; margin-bottom: 0; text-decoration: underline">HON. ROEL
                    N. CAR-AT</span>
                <br>
                <span style="font-size: 11px;">Barangay Council</span>
                <br>
                <br>
                <span style="font-size:12px; font-weight: bold; margin-bottom: 0; text-decoration: underline">HON. KYRA
                    JEAN T. TAN </span>
                <br>
                <span style="font-size: 11px;">SK Chairperson</span>
                <br>
                <br>
                <span style="font-size:12px; font-weight: bold; margin-bottom: 0; text-decoration: underline">JULIUS S.
                    MONTONG</span>
                <br>
                <span style="font-size: 11px;">Barangay IPMR</span>
                <br>
                <br>
                <span>=====================</span>
                <br>
                <span style="font-size:12px; font-weight: bold;">NOT VALID WITHOUT DRY SEAL</span>
            </div>


            <div class="grid-item2">
                <h1
                    style="font-size: 18px; font-weight: bolder; margin: 0; text-align: center; font-family: Arial Black;">
                    BARANGAY
                    CLEARANCE
                </h1>
                <br>
                <span
                    style="font-size:15px; font-family: Algerian; font-weight:bold; display: flex;align-items: center;">TO
                    WHOM IT MAY CONCERN:</span>
                <p style="font-size: 15px; font-family: Arial, Helvetica, sans-serif;text-align: justify;
                text-justify: inter-word; text-indent: 50px;">
                   THIS IS TO CERTIFY that based on the records of this Barangay of date the person whose name personal
                    circumstances and signature below has not been accused nor has a pending case with the Lupong
                    Tagapamayapa of neither crime involving moral turpitude nor act contrary to our existing law;</p>

                <p style="font-size: 15px; font-family: Arial, Helvetica, sans-serif;text-align: justify;
                    text-justify: inter-word; text-transform: capitalize">
                    Name: <b><?php echo $row['first_name']." ".$middle_initial." ".$row['last_name']." ".$row['suffix']?></b> <br>
                    Address: <b>Purok <?php echo  $row['purok'] ?>, Barangay Alkikan, Malungon, Sarangani Province </b><br>
                    Civil Status: <b><?php echo  $row['civil_status'] ?></b><br>
                    Citizenship: <b><?php echo  $row['nationality'] ?></b><br>
                    Occupation: <b><?php echo  $row['occupation'] ?></b><br>

                <p style="font-size: 15px; font-family: Arial, Helvetica, sans-serif;text-align: justify;
                    text-justify: inter-word;">
                    THIS BARANGAY CERTIFICATION is issued upon the request of the above named person for 
                    <?php
                     if($row['gender'] == "Female"){
                        echo "her";
                     }else {
                        echo "his";
                     } ?>
                      desire to <b><?php echo $purpose ?></b>
                    and whatever legal purposes that may serve <?php
                     if($row['gender'] == "Female"){
                        echo "her";
                     }else {
                        echo "him";
                     } ?> best
                </p>

                <p style="font-size: 15px; font-family: Arial, Helvetica, sans-serif;text-align: justify;
                    text-justify: inter-word;">
                    Issued this <b><?php echo $format_date ?></b> at Barangay Hall,
                    Alkikan, Malungon, Sarangani Province.
                </p>

                <br>

                <div class="grid-container">
                    <div class="grid-item3">
                        Prepared by:
                        <br>
                        <br>
                        <b style="font-size:15px; font-weight: bold; margin-bottom: 0; text-decoration: underline">GINA A. GENITE</b>
                        <br>
                        Barangay Secretary
                    </div>


                    <div class="grid-item4">
                        Attested & Approved by:
                        <br>
                        <br>
                        <b style="font-size:15px; font-weight: bold; margin-bottom: 0; text-decoration: underline">NILO H. ARELLANO</b>
                        <br>
                        Punong Barangay
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div style="text-align: center; float: left;">
                    <p style="font-size: 15px; font-family: Arial, Helvetica, sans-serif;">
                        Signed in the absence of Punong Barangay:
                        <br>
                        <br>
                        <hr style="height:1px; width: 200px; border:none;color:#333;background-color:#333; margin-bottom: 0;">
                        <b style="font-size: 15px; font-family: serif;">Kagawad On Duty l</b>
                    </p>
                </div>
            </div>
            <div class="buttons">
            <button class="print" id="print" onclick="window.print();window.location.href='save.php?id=<?php echo $id ?>&purpose=<?php echo $purpose ?>&date_issued=<?php echo $date_issued ?>'">Print</button>
            <button class="back" onclick="history.back()">Back</button>
            </div>
        </div>
    </div>
    <?php }?>
</body>

</html>