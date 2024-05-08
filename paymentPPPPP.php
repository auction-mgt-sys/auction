<?php
    session_start();
    
    $amount= $_SESSION['amount'];


    // Retrieve the session variables
   

    // Log the callback action


    // Perform actions based on successful payment
    // For example, update order status, send notifications, etc.
    // You can customize this section based on your application's requirements

    // Display a success message
   
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $requestData = json_decode(file_get_contents('php://input'), true);

//     if (isset($requestData['amount'])) {
//         $amount = $requestData['amount'];
//     } else {
//         $amount = null; // Set a default value or handle the missing value case
//     }

//     if (isset($requestData['quantity'])) {
//         $quantity = $requestData['quantity'];
//     } else {
//         $quantity = null; // Set a default value or handle the missing value case
//     }

    // if (isset($requestData['first_name'])) {
    //     $firstName = $requestData['first_name'];
    // } else {
//         $firstName = null; // Set a default value or handle the missing value case
//     }

    
   
// }
// $_SESSION['name'] = $firstName;
// $_SESSION["amount"] =$amount; 
// $_SESSION["qunatity"] = $quantity;



$transactionId = uniqid('', true);
// Simulate processing payment
//"callback_url": "http://localhost/verify.php",
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
  CURLOPT_POSTFIELDS =>'{
 "amount":"'.$amount.'",
  "currency": "ETB",
  "first_name": "alhamdu",
  "tx_ref": "'.$transactionId.'",
  "return_url":"http://localhost/sms/retailer/confirm.php",
  "customization[title]": "Payment for my favourite merchant",
  "customization[description]": "I love online payments."
  }',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer CHASECK_TEST-gi9WIRet1TtXtfrSbFmrt4luSfjqyurS',  
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
if($response){
  echo $response;

}
else{
  echo json_encode("hi");
}

?>