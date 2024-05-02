<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Chapa Payment</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      margin-top: 50px;
      width: 600px;
    }
    
  </style>

</head>
<body>

<div class="container">
  <h2 style="border: 5px solid #ddd; border-radius: 8px; padding: 20px; 
  box-shadow: 15px 15px 15px rgba(0, 0, 0, 0.1);"> Payment</h2>
 
  <table class="table table-striped" style="border: 5px 
  solid #ddd; border-radius: 8px; padding: 20px;
   box-shadow: 15px 15px 15px rgba(0, 0, 0, 0.1);">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Payment Status</th>
      </tr>
    </thead>
    <tbody id="tableBody">
      <tr>
        <td>1</td>
        <td> Product Purchaser</td>
        <td>2</td>
        <td style="color: orange;">Pending</td>
        <td>
        </td>
      </tr>
      
    </tbody>

  </table>

  <div class="container" >
 
  <form action="" method="POST"  style="border: 5px solid #ddd; border-radius: 8px; padding: 20px; 
  box-shadow: 15px 15px 15px rgba(0, 0, 0, 0.1);">
    <div class="form-group">
      <label for="firstName">First Name</label>
      <input type="text" class="form-control" id="firstName" name="firstName" required placeholder=" Newaz "  style="border: 3px solid #ddd; border-radius: 50px 30px; padding: 20px; 
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);">
    </div>
    <div class="form-group">
      <label for="lastName">Last Name</label>
      <input type="text" class="form-control" id="lastName" name="lastName" required placeholder=" Nezif"style="border: 3px solid #ddd; border-radius: 50px 30px; padding: 20px; 
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" name="address" required placeholder="Wolkite"style="border: 3px solid #ddd; border-radius: 50px 30px; padding: 20px; 
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);">
    </div>
    <div class="form-group">
      <label for="phoneNumber">Phone Number</label>
      <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required placeholder="0953652707"style="border: 3px solid #ddd; border-radius: 50px 30px; padding: 20px; 
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);">
    </div>
    <div class="form-group">
      <label for="amount">Amount</label>
      <input type="text" class="form-control" id="amount" name="amount" required style="border: 3px solid #ddd; border-radius: 50px 30px; padding: 20px; 
  box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1);">
    </div>

    <input type="submit" class="btn btn-primary" value="Pay With Chapa" style=" padding: 20px; border-radius: 5px 5px 40px 40px; box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); width: 520px;">

            </form>
</div>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount']; 
    $email = "newaznezif@gmail.com"; 
    $firstName = "HHHHHHHH";
     $phoneNumber = "0953652707";
    $txRef = "your-reference-" . time(); 
    $callbackUrl = "https://yourcallbackurl.com";
    $returnUrl = "https://yourreturnurl.com";

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.chapa.co/v1/transaction/initialize',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(array(
          'amount' => $amount,
            "email" => $email,
            'first_name' => 'Newaz',
            'last_name' => 'Nezif',
            "phone_number" => $phoneNumber,
            'currency' => "ETB",
            "tx_ref" => $txRef,
            "callback_url" => $callbackUrl,
           // "return_url" => $returnUrl,
            "customization" => array(
                "title" => "Payment",
                "description" => "Payment "
            )
        )),
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer CHASECK_TEST-8OvCdWo5ftb9wS9o1lzqAqEhFgaRVpxp',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

if (curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
}

$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if ($httpCode != 200) {
    echo "Failed to initialize payment. HTTP status code: $httpCode";
}

curl_close($curl);

if ($response === false) {
    echo "CURL Error: " . curl_error($curl);
} else {
    $decodedResponse = json_decode($response, true);
    if (!$decodedResponse || isset($decodedResponse['status']) && $decodedResponse['status'] !== 'success') {
        echo "API Error: " . json_encode($decodedResponse);
    } else {
        
        header('Location: ' . $decodedResponse['data']['checkout_url']);
        exit();
    }
}

}
?>
