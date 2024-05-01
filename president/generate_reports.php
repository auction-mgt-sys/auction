<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown</title>
    <style>
        .white-container {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 35px; /* Adjusted font size */
        }
    </style>
</head>
<body>
    <div class="white-container">
        <div class="main-container">
            <div class="container">
                <h2>Generated Reports</h2> <!-- Changed heading -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="selection">Select an Option:</label> <!-- Added label for select -->
                    <select id="selection" name="selection"> <!-- Moved select above the dropdown -->
                        <option value="auctions">Auctions</option>
                        <option value="requested_items">Requested Items</option>
                    </select>
                </form>
                <?php
                    // Process the selected option
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Retrieve the selected option from the form
                        $selection = $_POST["selection"];

                        // Display the selected option
                        if ($selection === "auctions") {
                            echo "You selected: Auctions";
                        } elseif ($selection === "requested_items") {
                            echo "You selected: Requested Items";
                        } else {
                            echo "Invalid selection";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
