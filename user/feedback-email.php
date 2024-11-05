<?php
require_once __DIR__ . '/../vendor/autoload.php';
include('../public/config.php');

// Start the session
session_start();

// Get the current accountID from the session
$accountID = $_SESSION['accountID'];

// Query to get the details including the accountID
$sql = "SELECT 
         rfa.*,
         acc.accountID,
         acc.fullName AS accFullName,
         acc.email AS accEmail,
         assign.*, 
         admin.adminID AS AdminID,
         admin.fullName AS adminFullName,
         admin.email AS adminEmail
     FROM 
         rfa AS rfa
     JOIN 
         account AS acc ON rfa.accountID = acc.accountID
     JOIN 
         assignment AS assign ON rfa.accountID = assign.accountID
     JOIN 
         admin AS admin ON assign.adminID = admin.adminID
     WHERE 
         rfa.status = 'COMPLETED' AND assign.accountID = ?;"; // Change to  SCHEDULED if want to test quick

// Prepare and execute the first query
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $accountID);
if (!$stmt->execute()) {
    die("Execution failed: " . $stmt->error);
}
$result = $stmt->get_result();
$feedback = $result->fetch_all(MYSQLI_ASSOC); // Fetch all rows into an array

// Fetch the most recent feedback data separately
$feedbackSql = "SELECT 
                    feed.feedbackID,
                    feed.feedback,
                    feed.rating,
                    assign.accountID AS feedbackAccountID
                FROM 
                    feedback AS feed
                JOIN 
                    assignment AS assign ON feed.accountID = assign.accountID
                WHERE 
                    assign.accountID = ?
                ORDER BY 
                    feed.created_at DESC 
                LIMIT 1;"; // Adjust 'created_at' based on your actual column name

// Prepare and execute the feedback query
$feedbackStmt = $conn->prepare($feedbackSql);
$feedbackStmt->bind_param("i", $accountID);
if (!$feedbackStmt->execute()) {
    die("Execution failed: " . $feedbackStmt->error);
}
$feedbackData = $feedbackStmt->get_result()->fetch_assoc(); // Fetch the most recent feedback record

// Combine the results as needed
foreach ($feedback as &$rfa) {
    // Add feedback data to each RFA if feedback exists
    if ($feedbackData) {
        $rfa['feedback'] = $feedbackData; // Add the recent feedback data
    } else {
        $rfa['feedback'] = null; // No feedback available
    }
}

// Configure API key authorization: api-key
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(), $config);

// Prepare the email to be sent
foreach ($feedback as $rfa) {
    // Check if feedback exists
    if ($rfa['feedback']) {
        $feedbackRecord = $rfa['feedback']; // Access the feedback record directly

        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
            'subject' => 'Request For Assistance Reference Number | Worker\'s Affairs Office Valenzuela City',
            'sender' => ['name' => 'WAO Valenzuela', 'email' => 'reidnacamposano@gmail.com'],
            'replyTo' => ['name' => 'WAO Valenzuela', 'email' => 'reidnacamposano@gmail.com'],
            'to' => [['name' => htmlspecialchars($rfa['adminFullName']), 'email' => htmlspecialchars($rfa['adminEmail'])]], // Ensure this has valid email
            'htmlContent' =>
            '<html>
                <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
                    <div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 20px; border-radius: 10px; border: 1px solid #007bff;">
                        <img src="https://example.com/path-to-your-image.jpg" alt="WAO Logo" style="width: 100%; height: auto; border-radius: 10px 10px 0 0;">
                        <h2 style="color: #007bff;">Hi ' . htmlspecialchars($rfa['adminFullName']) . '!</h2>
                        <p style="color: #333; line-height: 1.5;">You have received the following feedback from:</p>
                        <p style="color: #333;">
                            <strong>Requesting Party:</strong> ' . htmlspecialchars($rfa['accFullName']) . '<br>
                            <strong>Email:</strong> ' . htmlspecialchars($rfa['accEmail']) . '<br>
                            <strong>Feedback:</strong> ' . nl2br(htmlspecialchars($feedbackRecord['feedback'])) . '<br>
                            <strong>Rating:</strong> ' . htmlspecialchars($feedbackRecord['rating']) . '
                        </p>
                        <p style="color: #333;">Please review the feedback and respond accordingly.</p>
                        <p style="color: #333;">
                            For more information, visit our website: <a href="https://example.com" style="color: #007bff; text-decoration: none;">Visit WAO Valenzuela</a>
                        </p>
                        <p style="text-align: center; margin: 20px 0;"><strong>We value your feedback!</strong></p>
                        <p style="color: #333;">
                            Best regards,<br>
                            <strong>SEAD Team</strong><br>
                            <small>Workers’ Affairs Office<br>Valenzuela City</small>
                        </p>
                        <footer style="margin-top: 20px; text-align: center; color: #777;">
                            <p style="font-size: 12px;">This is an automated message. Please do not reply to this email.</p>
                        </footer>
                    </div>
                    <style>
                        a:hover {
                            color: #0056b3;
                        }
                    </style>
                </body>
            </html>'
        ]);

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }
    }
}

header("Location: ../user/history.php");
