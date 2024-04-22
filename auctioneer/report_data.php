<?php
include 'db_connect.php';

$response = array();

$qry = $conn->query("SELECT * FROM report WHERE auctionstatus = 0 and status = 1 LIMIT 1"); // Fetch the first row where auctionstatus is 0

if($qry->num_rows > 0) {
    $row = $qry->fetch_assoc();
    
    $response['status'] = 'success';
    $response['data'] = $row;
} else {
    $response['status'] = 'error';
}

echo json_encode($response);
?>
