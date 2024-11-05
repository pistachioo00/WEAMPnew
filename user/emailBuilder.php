<?php
/*
    THIS IS PRIMARILY USED TO SEND EMAILS WHEN RFA IS APPROVED
*/
session_start();

require_once('../vendor/autoload.php');
include('../public/config.php');

$accountID = $_SESSION['accountID'];

$sql = "SELECT * FROM rfa WHERE accountID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $accountID);
$stmt->execute();
$result = $stmt->get_result();
$rfa = $result->fetch_assoc();

$sql = "SELECT * FROM account WHERE accountID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $accountID);
$stmt->execute();
$result = $stmt->get_result();
$acc = $result->fetch_assoc();

if ($rfa) {
    // Successfully fetched RFA data
    var_dump($rfa);
} else {
    // No RFA data found
    echo "No RFA data found.";
}

if ($acc) {
    // Successfully fetched Account data
    var_dump($acc);
} else {
    // No Account data found
    echo "No Account data found.";
}


// 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

// Configure API key authorization: api-key
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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'); 
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
// // Configure API key authorization: partner-key
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('partner-key', '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');
// // Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
    'subject' => 'Request For Assistance Reference Number | Worker\'s Affairs Office Valenzuela City',
    'sender' => ['name' => 'WAO Valenzuela', 'email' => 'reidnacamposano@gmail.com'],
    'replyTo' => ['name' => 'WAO Valenzuela', 'email' => 'reidnacamposano@gmail.com'],
    'to' => [['name' => htmlspecialchars($acc['fullName']), 'email' => htmlspecialchars($acc['email'])]],
    'htmlContent' => '
     
     <html>
     <body>
     <h2 style="font-family: sub-font">
                Hi ' . htmlspecialchars($acc['fullName']) . '! Your RFA Form has been submitted with a Reference Number</h2>
        
                <h3 style="font-family: sub-font-bold;" class="mt-4">
                        SEAD RCMD NCR-VAL-' . htmlspecialchars($rfa['referenceID']) . '-' . date_format(date_create(htmlspecialchars($rfa['date'])), 'm-Y') . '</h3>

                        <p class="mt-4" style="font-family: sub-font">Reference Number shall also be sent on your registered
                        email provided with the form at WAO Front Desk.<br>
                        We look forward to assist you as soon as possible. Thanks for trusting WAO!</p>
        
                        <h4>Worker\'s Affairs Office</h4>

                        <p class="mt-4" style="font-family: sub-font">
                        This email message may contain confidential or legally privileged information and is intended only for the use of the intended recipient(s). Any unauthorized disclosure, dissemination, distribution, copying or the taking of any action in reliance on the information herein is prohibited. Emails are not secure and cannot be guaranteed to be error free as they can be intercepted, amended, or contain viruses. Anyone who communicates with us by email is deemed to have accepted these risks. Worker\'s Affairs Office is not responsible for errors or omissions in this message and denies any responsibility for any damage arising from the use of email. Any opinion and other statement contained in this message and any attachment are solely those of the author and do not necessarily represent those of the Worker\'s Affairs Office.
                        </p>

        
     </body>
     </html>'
]); // \Brevo\Client\Model\SendSmtpEmail | Values to send a transactional email

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
}

header("Location: ../user/rfa-sent.php");
