

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      margin-top: 50px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 style="border: 2px solid #ddd; border-radius: 8px; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">Tax Payment</h2>
 
  <table class="table table-striped" style="border: 2px solid #ddd; border-radius: 8px; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Payment Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="tableBody">
      <tr>
        <td>1</td>
        <td>Tax Payer</td>
        <td>2</td>
        <td style="color: orange;">Pending</td>
        <td>
            <form method="POST" action="">
                <input type="hidden" name="amount" value="300">
                <input type="submit" class="btn btn-primary" value="Pay With Chapa">
            </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount']; 
    $email = "jalane@gmail.com"; 
    $firstName = "Jalane ";
     $phoneNumber = "0904713829";
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
            'first_name' => "Jalane",
            'last_name' => "Jalane",
            "phone_number" => $phoneNumber,
            'currency' => "ETB",
            "tx_ref" => $txRef,
            "callback_url" => $callbackUrl,
           // "return_url" => $returnUrl,
            "customization" => array(
                "title" => "Payment",
                "description" => "Tax Payment "
            )
        )),
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer CHASECK_TEST-jrpMisgZejoYRhJrJoHyNqt59zBTxC1S',
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
