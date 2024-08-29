<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teamName = $_POST['teamName'];
    $captainName = $_POST['captainName'];
    $email = $_POST['email'];
    $members = $_POST['members'];

    // Save data to a notepad file
    $file = fopen("registrations.txt", "a");
    fwrite($file, "Team Name: " . $teamName . "\n");
    fwrite($file, "Captain's Name: " . $captainName . "\n");
    fwrite($file, "Email: " . $email . "\n");
    fwrite($file, "Members: " . $members . "\n\n");
    fclose($file);

    // Send confirmation email
    $to = $email;
    $subject = "Esports Team Registration Confirmation";
    $message = "Hello " . $captainName . ",\n\nThank you for registering your team '" . $teamName . "' for the tournament.\n\nBest of luck!\nZeroPing Arena";
    $headers = "From: taskinxabir@gmail.com";

    mail($to, $subject, $message, $headers);

    // Redirect to a confirmation page
    header("Location: confirmation.html");
    exit();
}
?>
