<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $team_name = htmlspecialchars($_POST['team_name']);
    $team_leader = htmlspecialchars($_POST['team_leader']);
    $email = htmlspecialchars($_POST['email']);
    $team_members = htmlspecialchars($_POST['team_members']);
    
    // Email to the website author (your email)
    $to_author = "taskinxabir@gmail.com";
    $subject_author = "New Team Registration: $team_name";
    $message_author = "Team Name: $team_name\nTeam Leader: $team_leader\nEmail: $email\nTeam Members: $team_members";
    $headers_author = "From: noreply@example.com";
    
    // Email to the team leader (confirmation)
    $to_user = $email;  // Uses the registered email
    $subject_user = "Registration Confirmation: $team_name";
    $message_user = "Dear $team_leader,\n\nThank you for registering your team '$team_name'.\n\nTeam Members: $team_members\n\nBest regards,\nTournament Organizer";
    $headers_user = "From: noreply@example.com";
    
    // Send emails
    $mail_sent_to_author = mail($to_author, $subject_author, $message_author, $headers_author);
    $mail_sent_to_user = mail($to_user, $subject_user, $message_user, $headers_user);
    
    // Redirect to completion page if both emails are sent successfully
    if ($mail_sent_to_author && $mail_sent_to_user) {
        header("Location: completion.php");
        exit();
    } else {
        echo "<div style='padding: 20px; text-align: center; background-color: #f8d7da; color: #721c24; border-radius: 8px; max-width: 500px; margin: 50px auto;'>
                <h2>Registration Failed</h2>
                <p>There was an error submitting your registration. Please try again later.</p>
              </div>";
    }
} else {
    echo "<div style='padding: 20px; text-align: center; background-color: #f8d7da; color: #721c24; border-radius: 8px; max-width: 500px; margin: 50px auto;'>
            <h2>Invalid Request</h2>
            <p>Please submit the form correctly.</p>
          </div>";
}
?>