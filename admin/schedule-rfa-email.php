<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
include('../public/config.php');

// Get the current admin ID from the session
$adminID = $_SESSION['adminID'];

// Query to get the details including the accountID
$sql = "SELECT 
         rfa.*,
         acc.accountID,
         acc.fullName AS accFullName,
         acc.email AS accEmail,
         assign.*, 
         admin.adminID,
         admin.fullName AS adminFullName,
         app.adminID AS appAdminID,
         app.date,
         app.time
     FROM 
         rfa AS rfa
     JOIN 
         account AS acc ON rfa.accountID = acc.accountID
     JOIN 
         assignment AS assign ON rfa.accountID = assign.accountID
     JOIN 
         admin AS admin ON assign.adminID = admin.adminID
     JOIN 
        approved AS app ON assign.adminID = app.adminID
     WHERE 
         rfa.status = 'APPROVED' AND assign.adminID = ?;"; // To be changed into APPROVED

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $adminID);
$stmt->execute();
$result = $stmt->get_result();
$assigned = $result->fetch_assoc();

if ($assigned) {
    $referenceID = $assigned['referenceID'];
    $sqlUpdate = "UPDATE rfa SET status = 'SCHEDULED' WHERE referenceID = ?;"; // SHOULD CHANGE INTO SCHEDULED
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("i", $referenceID);
    $stmtUpdate->execute();
}

// Configure API key authorization: api-key
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// // Configure API key authorization: partner-key

//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 (test-api)
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', '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');
// // Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

// $accountID = $assigned['accountID'];
// try mo pa din yung ganitong logic tas gawin mo idepende mo sa primary key ng tbl_account para lumabas lahat detail


$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
    'subject' => 'Request For Assistance Reference Number | Worker\'s Affairs Office Valenzuela City',
    'sender' => ['name' => 'WAO Valenzuela', 'email' => 'reidnacamposano@gmail.com'],
    'replyTo' => ['name' => 'WAO Valenzuela', 'email' => 'reidnacamposano@gmail.com'],
    'to' => [['name' => htmlspecialchars($assigned['accFullName']), 'email' => htmlspecialchars($assigned['accEmail'])]],
    'htmlContent' =>

    '<html>
        <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
            <div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 20px; border-radius: 10px; border: 1px solid #007bff;">
                <img src="https://example.com/path-to-your-image.jpg" alt="WAO Logo" style="width: 100%; height: auto; border-radius: 10px 10px 0 0;">

                <h2 style="font-family: Arial, sans-serif; color: #007bff;">
                    Hi ' . htmlspecialchars($assigned['accFullName']) . '!
                </h2>

                <p style="font-family: Arial, sans-serif; color: #333; line-height: 1.5;">
                    You are now scheduled for an initial interview. Please find your Reference Number below:
                </p>

                <h3 style="font-family: Arial, sans-serif; font-weight: bold; color: #007bff;">
                    SEAD RCMD NCR-VAL-' . htmlspecialchars($assigned['referenceID']) . '-' . date_format(date_create(htmlspecialchars($assigned['date'])), 'm-Y') . '
                </h3>

                <p style="font-family: Arial, sans-serif; color: #333;">
                    Below are the details of the scheduled interview:
                </p>

                <p style="font-family: Arial, sans-serif; color: #333;">
                    <strong>Date:</strong> ' . htmlspecialchars($assigned['date']) . '<br>
                    <strong>Time:</strong> ' . htmlspecialchars($assigned['time']) . '<br>
                    <strong>Location:</strong> Allied Local Emergency Response Teams, MacArthur Hwy, Valenzuela, Metro Manila <br>
                    <strong>Person to Look For:</strong> ' . htmlspecialchars($assigned['adminFullName']) . '<br>
                </p>

                <p style="font-family: Arial, sans-serif; color: #333;">
                    Thank you for your cooperation. If you have any questions, please feel free to reach out to us.
                </p>

                <p style="font-family: Arial, sans-serif; color: #333;">
                    For more information, visit our website: <a href="https://example.com" style="color: #007bff; text-decoration: none;">Visit WAO Valenzuela</a>
                </p>

                <!-- Feedback Button -->
                <div style="text-align: center; margin: 20px 0;">
                    <p style="font-family: Arial, sans-serif; color: #333;">
                        We value your feedback! Please take a moment to share your thoughts:
                    </p>
                    <a href="../user/feedback.php" style="display: inline-block; padding: 12px 24px; background-color: #d00000; color: white; text-decoration: none; border-radius: 5px; font-size: 16px; transition: background-color 0.3s;">
                        Provide Feedback
                    </a>
                </div>

                <p style="font-family: Arial, sans-serif; color: #333;">
                    Best regards,<br>
                    <strong>SEAD Team</strong><br>
                    <small>Workers’ Affairs Office<br>
                    Valenzuela City</small>
                </p>

                <footer style="margin-top: 20px; font-family: Arial, sans-serif; text-align: center; color: #777;">
                    <p style="font-size: 12px;">This is an automated message. Please do not reply to this email.</p>
                </footer>
            </div>

            <style>
                /* Hover effect for feedback button */
                a:hover {
                    background-color: #b00000; /* Darker shade for hover effect */
                }
            </style>
        </body>
    </html>'

]); // \Brevo\Client\Model\SendSmtpEmail | Values to send a transactional email

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}

header("Location: ../admin/assignment-take-action.php");
