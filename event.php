<?php

// Retrieve data from the product table
$sql = "SELECT * FROM products WHERE unix_timestamp(bid_end_datetime) >= " . strtotime(date("Y-m-d H:i")) . " ORDER BY name ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advertisements and Notifications</title>
  <style>
    /* CSS styles for professional layout */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4; /* Change background color as needed */
    }
    .container {
      max-width: 1200px; /* Adjust container width as needed */
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #fff; /* Container background color */
    }
    .row {
      display: flex;
      flex-wrap: wrap;
      margin: -15px;
    }
    .col-sm-4 {
      flex: 0 0 calc(33.333% - 30px); /* Adjust column width as needed */
      max-width: calc(33.333% - 30px); /* Adjust column width as needed */
      margin: 15px;
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .card-img-top {
      width: 100%;
      height: auto;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .card-body {
      padding: 20px;
      background-color: #fff; /* Card body background color */
    }
    .truncate {
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
    .badge {
      margin-right: 5px;
    }
    .badge-warning {
      background-color: #ffc107; /* Badge background color */
      color: #fff;
    }
    .badge-primary {
      background-color: #007bff; /* Badge background color */
      color: #fff;
    }
    .no-bids {
  text-align: center;
  padding: 20px;
  height: 200px; /* Adjust the height as needed */
  display: flex;
  justify-content: center;
  align-items: center;
}

  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="col-sm-4">
            <div class="card">
              <div class="float-right align-top bid-tag">
                <span class="badge badge-primary"><i class="fa fa-tag"></i> Form Price: <?php echo number_format($row['price_for_form']) ?></span>
              </div>
              <img class="card-img-top" src="auctioneer/assets/uploads/<?php echo $row['img_fname'] ?>" alt="<?php echo $row['name'] ?>">
              <div class="float-right align-top d-flex">
                <span class="badge badge-warning"><i class="fa fa-hourglass-half"></i> <?php echo date("M d,Y h:i A", strtotime($row['bid_end_datetime'])) ?></span>
              </div>
              <div class="card-body prod-item">
                <p><?php echo $row['name'] ?></p>
                <!-- <p><small><?php //echo $cat_arr[$row['category_id']] ?></small></p> -->
                <p class="truncate"><?php echo $row['description'] ?></p>
                <button class="btn btn-primary btn-sm view_prod" type="button" data-id="<?php echo $row['id'] ?>"> View</button>

              </div>
            </div>
          </div>
        <?php
        }
      } else {
        ?>
        <div class="col-12 no-bids">
          <p>There are currently no available bids.</p>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</body>
</html>
