<!DOCTYPE html>
<html lang="en">
<?php 
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
    $system = $conn->query("SELECT * FROM requesteditem limit 1")->fetch_array();
    foreach($system as $k => $v){
        $_SESSION['system'][$k] = $v;
    }
}
ob_end_flush();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type=text] {
            padding: 10px;
            margin-right: 10px;
            border-radius: 4px;
        }

        .entries {
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search for items..." onkeyup="filterTable()">
        </div>
        <table id="dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Measurement</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Fetch accepted items from the database where status = 1
                    $sql = "SELECT * FROM requesteditem WHERE status = 1";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["type"] . "</td>";
                            echo "<td>" . $row["description"] . "</td>";
                            echo "<td>" . $row["measurment"] . "</td>";
                            echo "<td>" . $row["quantity"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No accepted items found.</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                ?>
            </tbody>
        </table>
        <div class="entries" id="entries"></div>
    </div>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue, entries = 0;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");
            
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Filter by the 'Name' column
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        entries++;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            document.getElementById("entries").innerHTML = "Showing " + entries + " entries.";
        }
    </script>
</body>
</html>
