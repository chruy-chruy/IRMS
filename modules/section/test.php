<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Field Color Change</title>
    <style>
        select {
            padding: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <label for="statusSelect">Select Status:</label>
    <select id="statusSelect">
        <option value="0">Grey</option>
        <option value="1">Red</option>
        <option value="2">Default</option>
    </select>

    <script>
        const selectElement = document.getElementById("statusSelect");

        selectElement.addEventListener("change", function () {
            if (this.value === "1") {
                this.style.backgroundColor = "red";
                this.style.color = "white"; // To make text readable
            } else if (this.value === "0") {
                this.style.backgroundColor = "grey";
                this.style.color = "white"; // To make text readable
            } else {
                this.style.backgroundColor = ""; // Resets to default
                this.style.color = ""; // Resets to default
            }
        });
    </script>
</body>
</html>
