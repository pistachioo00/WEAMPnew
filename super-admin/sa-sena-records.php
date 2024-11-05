<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENA Records - Worker's Affairs Office</title>
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <!--Saved edit Details-->
    <?php
    echo '<script type="text/javascript">
            window.onload = function() {
                document.getElementById("detailSave").onclick = function () { 
                    alert("Successfully Saved!"); 
                }
            };
        </script>';
    ?>
    <!--Delete Row-->
    <?php
    echo '<script type="text/javascript">
            window.onload = function() {
                document.getElementById("deleteRow").onclick = function () { 
                    alert("Successfully Deleted."); 
                }
            };
        </script>';
    ?>
</head>

<style>
    .navbar-nav .nav-item .nav-link {
        color: white;
    }

    .container .row {
        border: 2.5px solid #304DA5;
        border-radius: 7px;
        padding: 1%;
        margin: 1%
    }

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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #C80000;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 70px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="nav nav-underline navbar-nav mx-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../super-admin/sa-home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../super-admin/sa-dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../super-admin/sa-rfa-entries.php" id="rfaLink"
                            data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click"
                            data-bs-title="<strong>New Entries</strong>" data-bs-content="Assignment"
                            data-bs-placement="bottom">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../super-admin/sa-sena-records.php"
                            id="recordsLink" data-bs-toggle="popover" data-bs-html="true" data-bs-trigger="click"
                            data-bs-title="<strong>SENA Conference</strong>" data-bs-content="Advice Counselling"
                            data-bs-placement="bottom">Records</a>
                    </li>
                </ul>
            </div>

            <a href="#">
                <ul class="navbar-nav ml-auto">
            </a>
            <a class="nav-link" href="../super-admin/sa-account.php" style="color: white">
                <img src="../assets/User/User.svg" alt="My-Account"
                    style="width: 20px; height: 20px; margin-right: 5px;">My Account
            </a>
            <a class="nav-link" href="logout.php" onclick="showLogoutConfirmation()" style="color: white">
                <img src="../assets/User/Line1.svg" alt="Line"
                    style="width: 20px; height: 20px; margin-right: 5px;">
                <img src="../assets/User/Sign_out_squre.svg" alt="Sign-out"
                    style="width: 20px; height: 20px; margin-right: 5px;">
                Log Out
            </a>
            </ul>
            </a>
        </div>
    </nav>


    <div class="container mt-5 mb-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="searchbar-rec" style="color: #304DA5;">
                    <div class="label">Claims/Issues</div>
                    <input type="text" class="form-control"
                        style="background-color: #F2F7FF; border: 1px solid grey; border-radius: 6px">
                </div>
            </div>
            <div class="col-md-3">
                <div class="searchbar-rec" style="color: #304DA5;">
                    <div class="label">Relief Prayed</div>
                    <input type="text" class="form-control"
                        style="background-color: #F2F7FF; border: 1px solid grey; border-radius: 6px">
                </div>
            </div>
            <div class="col-md-3">
                <div class="searchbar-rec" style="color: #304DA5;">
                    <div class="label">Date</div>
                    <div class="input-with-icon">
                        <input type="text" class="form-control"
                            style="background-color: #F2F7FF; border: 1px solid grey; border-radius: 6px">
                        <img src="../assets/blank-calendar--blank-calendar-date-day-month-empty.svg" class="icon"
                            alt="icon" style="width: 20px; height: 20px">
                    </div>
                </div>

            </div>
            <div class="col-md-2 mt-4">
                <div class="searchbar-rec">
                    <div class="label"></div>
                    <button class="btn btn-dark btn-block button fw-bold btn-hover"
                        style="font-family: Arial; height: 6%; font-size: .90rem; background-color:#465DA3;">SEARCH</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        function showLogoutConfirmation() {
            $('#logoutConfirmationModal').modal('show');
        }

        function logout() {
            window.location.href = '../super-admin/sa-login.php';
        }
    </script>


    <!-- Modal 2 for Edit Details -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Edit Details</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-dialog-scrollable">
                    <h2 class="text-start" style="font-family: sub-font-bold; font-weight: bold; color: #304DA5">SENA CONFERENCE
                    </h2>
                    <h3 class="text-start" style="font-family: sub-font; padding-bottom: 5%; color: #465DA3">Details</h3>

                    <h4 class="text-start fw-bold mt-5" style="font-family: sub-font; color: #465DA3;">Reference No.
                    </h4>
                    <h2 class="fw-bold text-start" style="font-family: Arial; color: #304DA5">SEAD
                        RCMD-NCR-VAL-03-004-2024</h2>

                    <div class="dropdown">
                        <h4>Action Taken</h4>
                        <div class="checkbox-container">
                            <div class="container">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight:bold">Submitted Date</td>
                                            <td>2024-03-08</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold; ">Created by</td>
                                            <td>Maria Clara Buenavista</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Received Date</td>
                                            <td>2024-03-09</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">SEADO Assigned</td>
                                            <td>admin-username</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr class="my-2" style="border-top: 2px solid grey;">

                    <!--Checkboxes-->
                    <div class="checkbox-container">
                        <!-- Checkbox 1 -->
                        <div class="sena-rec-checkboxes">
                            <div class=""></div>
                            <input type="checkbox" id="checkbox1">
                            <label for="checkbox1" style=" margin-left: 3%"><span
                                    style="font-weight: bold; font-size: 1rem">Advice and Counseling</span></label>
                        </div>
                        <hr class="my-2" style="border-top: 2px solid grey;">
                        <!-- Checkbox 2 -->
                        <div class="sena-rec-checkboxes">
                            <input type="checkbox" id="checkbox2" onchange="toggleDiv()">
                            <label for="checkbox2" style=" margin-left: 3%"><span
                                    style="font-family: Arial; font-weight: bold; font-size: 1rem;">Set Joint
                                    Conference</span></label>
                        </div>
                        <hr class="my-2" style="border-top: 2px solid grey;">


                        <!-- TOGGLE SET JOINT CONFERENCE EXPAND -->
                        <div id="additional-info" style="display: none;">

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-container">
                                        <label for="input1">Date</label>
                                        <div class="input-group date">
                                            <div class="input-field" style="border-radius: 3%"><input type="text"
                                                    id="input1" name="input1" class="form-control datepicker"
                                                    style="background-color: transparent; padding:10px; border: 2px solid black;">
                                                <img src="../assets/calendar-small.svg" alt="icon" class="icon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-container">
                                        <label for="input2">Time</label>
                                        <div class="input-group time">
                                            <div class="input-field" style="border-radius: 3%"><input type="text"
                                                    id="input2" name="input2" class="form-control timepicker"
                                                    style="background-color: transparent; padding:10px; border: 2px solid black;">
                                                <img src="../assets/clock-small.svg" alt="icon" class="icon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="originalContent">
                                <h5 class="fw-bold text-start"
                                    style="font-family: Arial; color: black; padding-top: 5%">Minutes of the
                                    Conference</h5>
                                <hr class="my-4" style="border-top: 2px solid grey;">
                                <div class="toolbar">
                                    <ul class="tool-list">
                                        <li class="tool">
                                            <button type="button" data-command="bold" class="tool--btn">
                                                <img src="../assets/Bold.svg" style="width: 20px; height: 20px; background-color: #465DA3;" "
                                                        alt="">
                                                </button>
                                            </li>
                                            <li class=" tool">
                                                <button type="button" data-command="italic" class="tool--btn">
                                                    <img src="../assets/Italic.svg" style="width: 20px; height: 20px;"
                                                        alt="">
                                                </button>
                                        </li>
                                        <li class="tool">
                                            <button type="button" data-command="underline" class="tool--btn">
                                                <img src="../assets/Underline.svg"
                                                    style="width: 20px; height: 20px;" alt="">
                                            </button>
                                        </li>
                                        <li class="tool">
                                            <button type="button" data-command="fontSize" class="tool--btn">
                                                <img src="../assets/Font Size.svg"
                                                    style="width: 20px; height: 20px;" alt="">
                                            </button>
                                        </li>
                                        <li class="tool">
                                            <button type="button" data-command='justifyLeft' class="tool--btn">
                                                <img src="../assets/Align Left.svg"
                                                    style="width: 20px; height: 20px;" alt="">
                                            </button>
                                        </li>
                                        <li class="tool">
                                            <button type="button" data-command='justifyRight' class="tool--btn">
                                                <img src="../assets/Align Right.svg"
                                                    style="width: 20px; height: 20px;" alt="">
                                            </button>
                                        </li>
                                        <li class="tool">
                                            <button type="button" data-command='justifyCenter' class="tool--btn">
                                                <img src="../assets/Align Justify.svg"
                                                    style="width: 20px; height: 20px;" alt="">
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="container" id="originalContainer"
                                    style="display: flex; align-items: center; margin-top: 10px;">
                                    <div id="output"
                                        style="flex: 1; background-color: #E5EEFF; border-radius: 5px; border: 2px solid black;"
                                        contenteditable="true"></div>
                                    <button class="image-button"
                                        style="height: 15px; width: 15px; border-radius:20%; margin-left: 10px;"
                                        onclick="cloneContainer()">
                                        <img src="../assets/Add_round_fill.svg" alt="Button">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkbox 3 -->
                    <div class="sena-rec-checkboxes" style="margin-right: 5px;">
                        <input type="checkbox" id="checkbox3">
                        <label for="checkbox3" style=" margin-left: 3%"><span
                                style="font-family: Arial; font-weight: bold; font-size: 1rem;">Settlement
                                Agreement</span></label>
                    </div>
                    <hr class="my-2" style="border-top: 2px solid grey;">

                    <!-- Checkbox 4 -->
                    <div class="sena-rec-checkboxes">
                        <input type="checkbox" id="checkbox4">
                        <label for="checkbox4" style=" margin-left: 3%"><span
                                style="font-family: Arial; font-weight: bold; font-size: 1rem;">Withdrawal</span></label>
                    </div>
                    <hr class="my-2" style="border-top: 2px solid grey;">

                    <!-- Checkbox 5 -->
                    <div class="sena-rec-checkboxes">
                        <input type="checkbox" id="checkbox5">
                        <label for="checkbox5" style=" margin-left: 3%"><span
                                style="font-family: Arial; font-weight: bold; font-size: 1rem;">Referral</span></label>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"
                            style="font-weight:bold;">Remarks</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>

                    <div class="modal-footer" style="border-top: 3px solid #757575;">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="detailSave" style="background-color: #465DA3">Save
                            changes</button>
                        <button type="button" class="btn btn-secondary"><a class="nav-link"
                                href="../super-admin/sa-sena-records.php">Close</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 4 for Delete Row -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Row</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this row?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><a class="nav-link"
                            href="../super-admin/sa-sena-records.php" id="deleteRow">Delete</button></a>
                    <button type="button" class="btn btn-secondary"><a class="nav-link"
                            href="../super-admin/sa-sena-records.php">Close</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <h2 class="text-start" style="font-family: sub-font-bold; font-weight: bold; color: #304DA5">SENA Conferences</h2>

        <table class="table-sena-records" style="padding-bottom: 14%;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Reference No</th>
                    <th>Claims/Issues</th>
                    <th>Settlement</th>
                    <th>Responding Party</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr style="background-color:#E5EEFF">
                    <td>2024-03-02</td>
                    <td>SEAD RCMD-NCR-<br>
                        VAL-03-002-2024</td>
                    <td>Illegal Dismissal</td>
                    <td>Settled</td>
                    <td>ABC Company</td>
                    <td>Individual</td>
                    <td>
                        <div class="button-container">
                            <a href="sa-sena-details.php"><button class="button col-md-3" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><img src="../assets/info.svg" alt=""></a></button>
                            <button class="button col-md-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2"><img
                                    src="../assets/pencil--change-edit-modify-pencil-write-writing.svg"
                                    alt=""></button>
                            <button class="button col-auto"><img src="../assets/import.svg" alt=""></button>
                            <button class="button col-md-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal4"><img src="../assets/trash.svg" alt=""></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2024-03-01</td>
                    <td>SEAD RCMD-NCR-<br>
                        VAL-03-001-2024</td>
                    <td>Illegal Dismissal with<br> Money Claims</td>
                    <td>Withdraw</td>
                    <td>HYBE Inc.</td>
                    <td>Group</td>
                    <td>
                        <div class="button-container">
                            <a href="sa-sena-details2.php"><button class="button col-md-3" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><img src="../assets/info.svg" alt=""></a></button>
                            <button class="button col-md-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2"><img
                                    src="../assets/pencil--change-edit-modify-pencil-write-writing.svg"
                                    alt=""></button>
                            <button class="button col-auto"><img src="../assets/import.svg" alt=""></button>
                            <button class="button col-md-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal4"><img src="../assets/trash.svg" alt=""></button>
                        </div>
                    </td>
                </tr>
                <tr style="background-color:#E5EEFF">
                    <td>2024-02-26</td>
                    <td>SEAD RCMD-NCR-<br>
                        VAL-02-026-2024</td>
                    <td>Illegal Dismissal</td>
                    <td>Settled</td>
                    <td>Rainbow Inc.</td>
                    <td>Individual</td>
                    <td>
                        <div class="button-container">
                            <a href="sa-sena-details.php"><button class="button col-md-3" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><img src="../assets/info.svg" alt=""></a></button>
                            <button class="button col-md-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2"><img
                                    src="../assets/pencil--change-edit-modify-pencil-write-writing.svg"
                                    alt=""></button>
                            <button class="button col-auto"><img src="../assets/import.svg" alt=""></button>
                            <button class="button col-md-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal4"><img src="../assets/trash.svg" alt=""></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="footer" style="background-color: #C80000;">
        <div class="container-footer" style="color: white;">
            <p>Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Bootstrap Datetime Picker JS -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
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
                let fontSize = prompt("Enter the font size (1-4): ", "2");
                document.execCommand(cmd, false, fontSize);
            } else {
                document.execCommand(cmd, false, null);
            }
        });
    }
</script>

</html>