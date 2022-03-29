<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
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
                        | Global View |
                    <a href="stats.php">  
                            Status
                    </a>
                    </h2>
                </nav>
            </div>
            <div id="box-small">
                <h3>
                    Sensor List
                </h3>
                    <?php
                        $sql1 = "SELECT * FROM `sensors`";
                        $result = $conn->query($sql1);
                        if ($result->num_rows > 0) {
                        // output data of each row
                            echo "<ul>";
                            while($row = $result->fetch_assoc()) {
                                echo "<li> |  ".$row["SENSOR_NAME"]."  |  ".$row["SENSOR_IP"]."  | </li><br>";
                            }
                            echo "</ul><br>";
                        }
                        else {
                            echo "0 results";
                        }
                    ?>
            </div>
            <div id="box-small">
                <h3>
                    Web App List
                </h3>
                    <?php
                        $sql2 = "SELECT * FROM `apps`";
                        $result = $conn->query($sql2);
                        if ($result->num_rows > 0) {
                        // output data of each row
                            echo "<ul>";
                            while($row = $result->fetch_assoc()) {
                                echo "<li> |  ". $row["APP_NAME"]."  |  ".$row["APP_ADDRESS"]."  |  ".$row["APP_DESCRIPTION"]."  | </li><br>";
                            }
                            echo "</ul><br>";
                        }
                        else {
                            echo "0 results";
                        }
                    ?>
            </div>
            <div id="box-big">
                <h3>
                    Recent Logs
                </h3>
                <?php
                    $sql3 = "SELECT TIMESTAMP, SENSOR_ID, APP_ID, RAW_DATA FROM `logs`";
                    $result = $conn->query($sql3);
                    if ($result->num_rows > 0) {
                    // output data of each row
                        echo "<ul>";
                        while($row = $result->fetch_assoc()) {
                            echo "<li> |  ". $row["TIMESTAMP"]."  |  ".$row["SENSOR_ID"]."  |  ".$row["APP_ID"]."  |  ".$row["RAW_DATA"]."  | </li><br>";
                        }
                        echo "</ul><br>";
                    }
                    else {
                        echo "0 results";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
