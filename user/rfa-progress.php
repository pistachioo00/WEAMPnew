<?php

function rfaProgress($accountID) {
    include '../public/config.php';

    // Check if a record with the same accountID already exists
    $sql = "SELECT referenceID, status FROM rfa WHERE accountID =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $accountID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Display the reference ID and status
        echo 'Reference ID: '. $row['referenceID'];
        echo '<br>';
        echo 'Status: '. $row['status'];

        // Display a progress bar based on the status
        switch ($row['status']) {
            case 'pending':
                echo '<div class="progress">';
                echo '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>';
                echo '</div>';
                break;
            case 'in progress':
                echo '<div class="progress">';
                echo '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>';
                echo '</div>';
                break;
            case 'completed':
                echo '<div class="progress">';
                echo '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>';
                echo '</div>';
                break;
        }
    } else {
        // Redirect to rfa-sent page
        header('Location: rfa-sent.php');
        exit;
    }
}