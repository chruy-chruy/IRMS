<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Weekly Scheduler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .scheduler {
            display: grid;
            grid-template-columns: 100px repeat(5, 1fr);
            grid-auto-rows: 50px;
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            background: white;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .scheduler div {
            border: 1px solid #ddd;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
        .scheduler .header {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }
        .scheduler .time-slot {
            background-color: #f9f9f9;
            font-weight: bold;
            color: #333;
        }
        .scheduler .subject {
            background-color: #e3f2fd;
            color: #1e88e5;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .scheduler .break {
            background-color: #ffecb3;
            color: #ff9800;
        }
        .scheduler .lunch {
            background-color: #c8e6c9;
            color: #388e3c;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; color: #333;">Student Weekly Scheduler</h1>
    <div class="scheduler">
        <!-- Header -->
        <div class="header"></div>
        <div class="header">Monday</div>
        <div class="header">Tuesday</div>
        <div class="header">Wednesday</div>
        <div class="header">Thursday</div>
        <div class="header">Friday</div>

        <!-- Time Slots and Subjects -->
        <div class="time-slot">7:30 - 8:30</div>
        <div class="subject">Math</div>
        <div class="subject">Science</div>
        <div class="subject">History</div>
        <div class="subject">English</div>
        <div class="subject">Music</div>

        <div class="time-slot">8:31 - 9:30</div>
        <div class="subject">Science</div>
        <div class="subject">Math</div>
        <div class="subject">Math</div>
        <div class="subject">Science</div>
        <div class="subject">History</div>

        <div class="time-slot">9:31 - 10:00</div>
        <div class="break">Morning Break</div>
        <div class="break">Morning Break</div>
        <div class="break">Morning Break</div>
        <div class="break">Morning Break</div>
        <div class="break">Morning Break</div>

        <div class="time-slot">10:01 - 11:00</div>
        <div class="subject">History</div>
        <div class="subject">English</div>
        <div class="subject">Science</div>
        <div class="subject">Math</div>
        <div class="subject">PE</div>

        <div class="time-slot">11:01 - 12:00</div>
        <div class="subject">English</div>
        <div class="subject">History</div>
        <div class="subject">English</div>
        <div class="subject">History</div>
        <div class="subject">Science</div>

        <div class="time-slot">12:00 - 1:00</div>
        <div class="lunch">Lunch</div>
        <div class="lunch">Lunch</div>
        <div class="lunch">Lunch</div>
        <div class="lunch">Lunch</div>
        <div class="lunch">Lunch</div>

        <div class="time-slot">1:00 - 2:00</div>
        <div class="subject">PE</div>
        <div class="subject">Art</div>
        <div class="subject">PE</div>
        <div class="subject">Music</div>
        <div class="subject">Math</div>

        <div class="time-slot">2:01 - 3:00</div>
        <div class="subject">Music</div>
        <div class="subject">PE</div>
        <div class="subject">Music</div>
        <div class="subject">Art</div>
        <div class="subject">English</div>

        <div class="time-slot">3:01 - 4:00</div>
        <div class="subject">Art</div>
        <div class="subject">Math</div>
        <div class="subject">PE</div>
        <div class="subject">Science</div>
        <div class="subject">History</div>

        <div class="time-slot">4:01 - 5:00</div>
        <div class="subject">English</div>
        <div class="subject">History</div>
        <div class="subject">Science</div>
        <div class="subject">Math</div>
        <div class="subject">Art</div>
    </div>
</body>
</html>
