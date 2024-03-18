<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            color: #3498db;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        
        th {
            background-color: #3498db;
            color: #fff;
        }
        
        tbody td {
            font-size: 20px; /* Adjust the font size as needed */
        }
    </style>
</head>
<body>
    <div class="container">
        <table>
            <tbody>
                <?php
                    // Replace these variables with your actual database connection details
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "auc_mgt_sys";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Example query to fetch requests from the database
                    $sql = "SELECT request_text FROM requests_table";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>{$row['request_text']}</td></tr>";
                        }
                    } else {
                        echo "<tr><td>No requests available now.</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>