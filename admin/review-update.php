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
         admin.fullName AS adminFullName
     FROM 
         rfa AS rfa
     JOIN 
         account AS acc ON rfa.accountID = acc.accountID
     JOIN 
         assignment AS assign ON rfa.accountID = assign.accountID
     JOIN 
         admin AS admin ON assign.adminID = admin.adminID 
     WHERE 
         rfa.status = 'REVIEWED' AND assign.adminID = ?;";

// Prepare the statement
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('MySQL prepare error: ' . htmlspecialchars($conn->error));
}

// Bind parameters
$stmt->bind_param("i", $adminID);

// Execute the statement
if (!$stmt->execute()) {
    die('Execute error: ' . htmlspecialchars($stmt->error));
}

// Get the result
$result = $stmt->get_result();
$assigned = $result->fetch_assoc();

if (!$assigned) {
    die('No records found or fetch error: ' . htmlspecialchars($stmt->error));
}

// Configure API key authorization: api-key
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

// Create an API instance
$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
    new GuzzleHttp\Client(),
    $config
);

$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
    'subject' => 'Request For Assistance Reference Number | Worker\'s Affairs Office Valenzuela City',
    'sender' => ['name' => 'WAO Valenzuela', 'email' => 'reidnacamposano@gmail.com'],
    'replyTo' => ['name' => 'WAO Valenzuela', 'email' => 'reidnacamposano@gmail.com'],
    'to' => [['name' => htmlspecialchars($assigned['accFullName']), 'email' => htmlspecialchars($assigned['accEmail'])]],
    'htmlContent' =>
    '<html>
    <body style="margin: 0; padding: 20px; background-color: #f4f4f4; font-family: Arial, sans-serif; color: #333;">
        <!-- Header -->
        <table width="100%" style="max-width: 600px; margin: 0 auto; background-color: white; border-radius: 8px;">
            <tr>
                <td style="padding: 20px; text-align: center; background-color: #003366; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                    <img src="../assets/WAO-Logo.svg" alt="Organization Logo" style="max-width: 120px;">
                </td>
            </tr>
            <tr>
                <td style="padding: 20px; text-align: center; background-color: #ffffff;">
                    <h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #003366; margin: 0;">
                        Hi <span style="color: #d00000;">' . htmlspecialchars($assigned['accFullName']) . '</span>,
                    </h2>
                    <p style="font-size: 16px; margin-top: 20px;">
                        Your RFA Form has been <strong>reviewed</strong> by SEADO with the following Reference Number:
                    </p>
                    <h3 style="font-family: Arial, sans-serif; font-size: 22px; color: #d00000; margin: 20px 0;">
                        SEAD RCMD NCR-VAL-<span style="color: #003366;">' . htmlspecialchars($assigned['referenceID']) . '-' . date_format(date_create(htmlspecialchars($assigned['date'])), 'm-Y') . '
                    </h3>
                </td>
            </tr>

            <!-- Call to Action -->
            <tr>
                <td style="padding: 20px; text-align: center; background-color: #ffffff;">
                    <a href="' . htmlspecialchars($actionLink) . '" style="display: inline-block; padding: 10px 20px; background-color: #d00000; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">
                        View Full Report
                    </a>
                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td style="padding: 20px; text-align: center; background-color: #003366; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                    <p style="color: white; font-size: 12px; margin: 0;">
                        © 2024 SEADO | All rights reserved.<br>
                        For any inquiries, contact us at <a href="mailto:support@seado.gov" style="color: #ffffff;">support@seado.gov</a>
                    </p>
                </td>
            </tr>
        </table>
    </body>
</html>'
]);

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}

header("Location: ../admin/rfa-assignment.php");
