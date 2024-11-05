<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Take Action - Worker's Affairs Office</title>
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- CSS Style -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            overflow: hidden;
        }
    </style>
    <?php
    echo '<script type="text/javascript">
            window.onload = function() {
                document.getElementById("rfaSave").onclick = function () { 
                    alert("Successfully Saved!"); 
                }
            };
        </script>';
    ?>
</head>
<style>
    .tool-list {
        display: flex;
        flex-flow: row nowrap;
        list-style: none;
        padding: 0;
        overflow: hidden;
        gap: 10px;
        border-radius: 5px;
        background-color: white;
        justify-content: end;
        margin-right: 10%;
    }

    .tool--btn {
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        border-radius: 5px;
        height: 20px;
        width: 20px;
        font-size: 12px;
        cursor: pointer;
        background-color: transparent;
    }

    .tool--btn img {
        width: 100%;
        height: 100%;
        vertical-align: middle;
    }

    .tool--btn:hover {
        background-color: #dddddd;
    }

    #output {
        height: 400px;
        padding: 1rem;
        width: 90%;
        border: 1px solid #333;
        border-radius: 5px;
        background-color: white;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../user/index.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav nav-underline mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../super-admin/sa-home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../super-admin/sa-dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../super-admin/sa-rfa-entries.php">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../super-admin/sa-sena-records.php">Records</a>
                    </li>
                    <div class="mr-5"></div>
                    <li>
                        <a class="nav-link" href="../super-admin/sa-account.php">
                            <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                            My Account
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../super-admin/sa-login.php" onclick="showLogoutConfirmation()">
                            <img src="../assets/Sign_out_squre.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Add the logout confirmation modal markup -->
    <div class="modal fade" id="logoutConfirmationModal" tabindex="-1" aria-labelledby="logoutConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-center" id="logoutConfirmationModalLabel">Logout Confirmation</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to log out?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="logout()">Logout</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding-top:3%">
        <h2 class="text-start" style="font-family: sub-font-bold; font-weight: bold">ASSIGNMENT</h2>

        <div class="container">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="font-weight:bold">Submitted date</td>
                        <td>2024-03-08</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Created by</td>
                        <td>Maria Clara Buenavista</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Received date</td>
                        <td>2024-03-09</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">SEADO assigned</td>
                        <td>admin-username</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h4 class="fw-bold text-end mt-5" style="font-family: Arial; color: black">Reference No.</h4>
        <h2 class="fw-bold text-end" style="font-family: Arial; color: black">SEAD RCMD-NCR-VAL-03-004-2024</h2>

        <hr class="my-4" style="border-top: 2px solid black;">


        <div class="checkbox-container">
            <!-- Checkbox 1 -->
            <div class="sena-rec-checkboxes">
                <div class=""></div>
                <input type="checkbox" id="checkbox1">
                <label for="checkbox1"><span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Advice and Counseling</span></label>
            </div>
            <hr class="my-4" style="border-top: 2px solid #367AFF;">
            <!-- Checkbox 2 -->
            <div class="sena-rec-checkboxes">
                <input type="checkbox" id="checkbox2" onchange="toggleDiv()">
                <label for="checkbox2"><span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Set Joint Conference</span></label>
            </div>


            <!-- TOGGLE SET JOINT CONFERENCE EXPAND -->
            <div id="additional-info" style="display: none;">

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-container">
                            <label for="input1">Date</label>
                            <div class="input-group date">
                                <div class="input-field" style="border-radius: 3%"><input type="text" id="input1" name="input1" class="form-control datepicker" style="background-color: transparent; padding:10px; border: 2px solid black;">
                                    <img src="../assets/calendar-small.svg" alt="icon" class="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-container">
                            <label for="input2">Time</label>
                            <div class="input-group time">
                                <div class="input-field" style="border-radius: 3%"><input type="text" id="input2" name="input2" class="form-control timepicker" style="background-color: transparent; padding:10px; border: 2px solid black;">
                                    <img src="../assets/clock-small.svg" alt="icon" class="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="originalContent">
                    <h5 class="fw-bold text-start" style="font-family: Arial; color: black; padding-top: 5%">Minutes of the Conference</h5>
                    <hr class="my-4" style="border-top: 2px solid black;">
                    <div class="toolbar">
                        <ul class="tool-list">
                            <li class="tool">
                                <button type="button" data-command="bold" class="tool--btn">
                                    <img src="../assets/Bold.svg" style="width: 20px; height: 20px;" alt="">
                                </button>
                            </li>
                            <li class="tool">
                                <button type="button" data-command="italic" class="tool--btn">
                                    <img src="../assets/Italic.svg" style="width: 20px; height: 20px;" alt="">
                                </button>
                            </li>
                            <li class="tool">
                                <button type="button" data-command="underline" class="tool--btn">
                                    <img src="../assets/Underline.svg" style="width: 20px; height: 20px;" alt="">
                                </button>
                            </li>
                            <li class="tool">
                                <button type="button" data-command="fontSize" class="tool--btn">
                                    <img src="../assets/Font Size.svg" style="width: 20px; height: 20px;" alt="">
                                </button>
                            </li>
                            <li class="tool">
                                <button type="button" data-command='justifyLeft' class="tool--btn">
                                    <img src="../assets/Align Left.svg" style="width: 20px; height: 20px;" alt="">
                                </button>
                            </li>
                            <li class="tool">
                                <button type="button" data-command='justifyRight' class="tool--btn">
                                    <img src="../assets/Align Right.svg" style="width: 20px; height: 20px;" alt="">
                                </button>
                            </li>
                            <li class="tool">
                                <button type="button" data-command='justifyCenter' class="tool--btn">
                                    <img src="../assets/Align Justify.svg" style="width: 20px; height: 20px;" alt="">
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="container" id="originalContainer" style="display: flex; align-items: center; margin-top: 10px;">
                        <div id="output" style="flex: 1; background-color: #E5EEFF; border-radius: 10px; border: 2px solid black;" contenteditable="true"></div>
                        <button class="image-button" style="height: 30px; width: 30px; border-radius:50%; margin-left: 10px;" onclick="cloneContainer()">
                            <img src="../assets/Add_round_fill.svg" alt="Button">
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <hr class="my-4" style="border-top: 2px solid #367AFF;">

        <!-- Checkbox 3 -->
        <div class="sena-rec-checkboxes">
            <input type="checkbox" id="checkbox3">
            <label for="checkbox3"><span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Settlement Agreement</span></label>
        </div>
        <hr class="my-4" style="border-top: 2px solid #367AFF;">

        <!-- Checkbox 4 -->
        <div class="sena-rec-checkboxes">
            <input type="checkbox" id="checkbox4">
            <label for="checkbox4"><span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Withdrawal</span></label>
        </div>
        <hr class="my-4" style="border-top: 2px solid #367AFF;">

        <!-- Checkbox 5 -->
        <div class="sena-rec-checkboxes">
            <input type="checkbox" id="checkbox5">
            <label for="checkbox5"><span style="font-family: Arial; font-weight: bold; font-size: 1.5rem">Referral</span></label>
        </div>

        <hr class="my-4 mb-5" style="border-top: 2px solid black;">


        <label><span style="font-family: Arial; font-weight: bold; font-size: 1.5rem; padding-left: 3.5%">Remarks</span></label>
        <textarea class="mb-5" id="remarks-textarea" rows="10"></textarea>


        <div class="btn-container" style="padding-bottom: 8%">
            <a href="sa-assignment-take-action.php">
                <div class="left-btn col-md-70" style="margin-left: -4%;">
                    <i class="bi bi-check-circle-fill"><button class="left-button" id="rfaSave">SAVE</button></i>
                </div>
            </a>
            <a href="#">
                <div class="left-btn col-md-75" style="margin-left: 9%;">
                    <button class="left-button">CANCEL</button>
                </div>
            </a>
            <div class="right-btn col-md-2" style="margin-left:65%">
                <button class="right-button" style="background-color:#696969"><a class="nav-link" href="../super-admin/sa-rfa-no-assignment.php">CLOSE CASE</button></a>
            </div>
        </div>
    </div>
    </div>


    <footer class="footer fixed-bottom">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Bootstrap Datetime Picker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize the datetime picker plugin
        $('#input1').datepicker({
            format: 'mm/dd/yyyy', // Specify the date format
            autoclose: true // Close the picker when a date is selected
        });
    });
    $(document).ready(function() {
        // Initialize the datetime picker plugin
        $('#input2').timepicker({
            format: 'mm/dd/yyyy', // Specify the date format

            autoclose: true // Close the picker when a date is selected
        });
    });
    // Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    function toggleDiv() {
        var checkbox = document.getElementById('checkbox2');
        var additionalInfoDiv = document.getElementById('additional-info');

        // Check if the checkbox is checked
        if (checkbox.checked) {
            additionalInfoDiv.style.display = 'block'; // Show the div
        } else {
            additionalInfoDiv.style.display = 'none'; // Hide the div
        }
    }

    function cloneContainer() {
        // Clone the original content and container
        var originalContent = document.getElementById('originalContent');
        var clonedContent = originalContent.cloneNode(true);
        var originalContainer = clonedContent.querySelector('#originalContainer');

        // Remove the button from the cloned container
        var button = originalContainer.querySelector('.image-button');
        button.remove();

        // Append the cloned content after the original content
        originalContent.parentNode.insertBefore(clonedContent, originalContent.nextSibling);
    }

    /////////////////////////////////
    let output = document.getElementById('output');
    let buttons = document.getElementsByClassName('tool--btn');
    for (let btn of buttons) {
        btn.addEventListener('click', () => {
            let cmd = btn.dataset['command'];
            if (cmd === 'createlink') {
                let url = prompt("Enter the link here: ", "http:\/\/");
                document.execCommand(cmd, false, url);
            } else if (cmd === 'fontSize') {
                let fontSize = prompt("Enter the font size (1-7): ", "3");
                document.execCommand(cmd, false, fontSize);
            } else {
                document.execCommand(cmd, false, null);
            }
        });
    }
</script>

</html>