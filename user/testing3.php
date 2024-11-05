<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Complaint Status Tracker</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Complaint Status Tracker</h1>
    <?php
    // Example complaint status
    $status = 'Pending'; // This can be 'Pending', 'In Progress', 'Completed', 'Closed Case'

    switch ($status) {
        case 'Pending':
            $message = "Your complaint is pending.";
            $progress = 25;
            $class = 'bg-warning';
            break;
        case 'In Progress':
            $message = "Your complaint is being processed.";
            $progress = 50;
            $class = 'bg-info';
            break;
        case 'Completed':
            $message = "Your complaint has been resolved.";
            $progress = 75;
            $class = 'bg-success';
            break;
        case 'Closed Case':
            $message = "Your complaint case is closed.";
            $progress = 100;
            $class = 'bg-secondary';
            break;
        default:
            $message = "Unknown status.";
            $progress = 0;
            $class = 'bg-danger';
    }
    ?>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Complaint Status</h5>
            <p class="card-text"><?php echo $message; ?></p>
            <div class="progress">
                <div class="progress-bar <?php echo $class; ?>" role="progressbar" style="width: <?php echo $progress; ?>%;" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $progress; ?>%</div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
