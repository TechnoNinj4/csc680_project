<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = ""; 
            $dbname = "app_checker";
            $conn = new mysqli($servername, $username, $password,  $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        ?>
        <div id="container">
            <div id="box-nav">
                <nav>
                    <h2>
                    <a href="index.php">
                            Home
                    </a>
                        | Stats View |
                    <a href="stats.php">  
                            Status
                    </a>
                    </h2>
                </nav>
            </div>
            <div id="box-small">
                <h3>
                    Database Statistics
                </h3>
                <?php
                    echo "<ul>";
                    $sql1 = "SELECT COUNT(SENSOR_ID) AS NumberOfSensors FROM sensors;";
                    $result = $conn->query($sql1);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<li>Total Sensors: ".$row["NumberOfSensors"]."</li><br>";
                        }
                    }
                    else {
                        echo "0 results";
                    }
                    $sql2 = "SELECT COUNT(APP_ID) AS NumberOfApps FROM apps;";
                    $result = $conn->query($sql2);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<li>Total Apps: ".$row["NumberOfApps"]."</li><br>";
                        }
                    }
                    else {
                        echo "0 results";
                    }
                    $sql3 = "SELECT COUNT(LOG_ID) AS NumberOflogs FROM logs;";
                    $result = $conn->query($sql3);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<li>Total Logs: ".$row["NumberOflogs"]."</li><br>";
                        }
                    }
                    else {
                        echo "0 results";
                    }
                    echo "</ul><br>";
                ?>
            </div>
        </div>
    </body>
</html>
