<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            text-align: center;
        }
        .container {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        table {
            border-collapse: collapse;
            width: 48%;
            margin: 10px;
            font-size: 14px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
        .full-width {
            width: 100%;
        }
        @media print {
            @page {
        size: legal portrait;
        /* margin: 10mm; */
    }
            body {
                transform: rotate(-90deg);
                transform-origin: left top;
                width: 100vh;
                height: 100vw;
                overflow: hidden;
                position: absolute;
                top: 100%;
                left: 0;
                bottom: 0;
            }
            .container{
                margin:10px;
            }

        }
    </style>
</head>
<body>
    <h2>REPORT ON LEARNING PROGRESS AND ACHIEVEMENT</h2>
    <div class="container">
        <table>
            <tr>
                <th>Learning Areas</th>
                <th>Quarter 1</th>
                <th>Quarter 2</th>
                <th>Quarter 3</th>
                <th>Quarter 4</th>
                <th>Final Grade</th>
                <th>Remarks</th>
            </tr>
            <tr><td>Filipino</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>English</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Mathematics</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Science</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Araling Panlipunan (AP)</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>EsP</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>TLE</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Computer</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>MAPEH</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Music</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Arts</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Physical Education</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Health</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><th colspan="5">General Average</th><td colspan="2"></td></tr>
        </table>
        
        <table>
            <tr>
                <th>Core Values</th>
                <th>Behavior Statements</th>
                <th>Quarter 1</th>
                <th>Quarter 2</th>
                <th>Quarter 3</th>
                <th>Quarter 4</th>
            </tr>
            <tr><td>Maka-Diyos</td><td>Expresses spiritual beliefs, upholds truth</td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Makatao</td><td>Shows sensitivity to differences</td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Makakalikasan</td><td>Uses resources wisely</td><td></td><td></td><td></td><td></td></tr>
            <tr><td>Makabansa</td><td>Exercises rights responsibly</td><td></td><td></td><td></td><td></td></tr>
        </table>
    </div>
    <div class="container">
    <table>
        <tr>
            <th>Descriptors</th>
            <th>Grading Scale</th>
            <th>Remarks</th>
        </tr>
        <tr><td>Outstanding</td><td>90 - 100</td><td>Passed</td></tr>
        <tr><td>Very Satisfactory</td><td>85 - 89</td><td>Passed</td></tr>
        <tr><td>Satisfactory</td><td>80 - 84</td><td>Passed</td></tr>
        <tr><td>Fairly Satisfactory</td><td>75 - 79</td><td>Passed</td></tr>
        <tr><td>Did Not Meet Expectations</td><td>Below 75</td><td>Failed</td></tr>
    </table>
    
    <table>
        <tr>
            <th>Marking</th>
            <th>Non-numerical Rating</th>
        </tr>
        <tr><td>AO</td><td>Always Observed</td></tr>
        <tr><td>SO</td><td>Sometimes Observed</td></tr>
        <tr><td>RO</td><td>Rarely Observed</td></tr>
        <tr><td>NO</td><td>Not Observed</td></tr>
    </table>
    </div>
</body>
</html>
