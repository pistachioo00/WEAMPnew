<?php
include 'signup-check.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .container {
            overflow: hidden;
        }

        .input-with-icon {
            background-image: url('../assets/calendar-blank.svg');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 17px;
            padding-right: 30px;
        }

        .upload-container {
            display: flex;
            gap: 20px;
        }

        .upload-box {
            position: relative;
            padding: 20px;
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 8px;
            text-align: center;
            width: 100%;
        }

        .upload-label {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .upload-label:hover {
            background-color: #0056b3;
        }

        .status-text {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #777;
        }

        input[type="file"] {
            display: none;
        }

        .upload-icon {
            width: 100%;
            height: auto;
            max-width: 100px;
            max-height: 100px;
            margin-bottom: 10px;
            object-fit: contain;
        }

        .upload-container {
            display: flex;
            justify-content: space-between;
        }

        .upload-box {
            width: 300px;
            height: 250px;
            position: relative;
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            overflow: hidden;
        }

        .upload-icon {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .upload-label {
            display: block;
            margin-top: 10px;
        }

        .status-text {
            margin-top: 10px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:#C80000;">
        <div class="container">
            <a class="navbar-brand" href="../public/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" class="img-fluid" style="width: 300px; height: 75px;">
            </a>
            <button style="width: 10%; height: 50%" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/signup.php" id="rfaLink">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/contact-us.php">Contact</a>
                    </li>
                    <div class="mr-5"></div>
                    <li>
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/signup.php   ">
                            <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                            Register
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" style="text-decoration: none; color: white" href="../public/login.php" onclick="showLogoutConfirmation()">
                            <img src="../assets/Sign_in_squre.svg" alt="Sign-in" style="width: 20px; height: 20px; margin-right: 5px;">
                            Sign in
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="news-sec">
        <div class="container">
            <div class="row justify-content-center align-items-center"> <!-- Modified row class -->
                <div class="col-12 text-center" style="margin-bottom: -10px; padding-top: 5%">
                    <h1 class="display-2 mb-2" style="font-family: main-font; font-size: 3.5rem; margin: 100px 0px -20px 0px; color: #1C05B3; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">WEMP</h1>
                    <p class="display-2 mb-0" style="font-family: Arial, sans serif; font-size: 1.3rem; margin-top: -5px; color: #3682CC">Workers and Employers Management Platform</p>
                </div>
            </div>
        </div>
    </section>

    <section class="assist-sec">
        <div class="container">
            <h1 class="display-2 text-center" style="font-family: sub-font-bold; font-size: 1.5rem; padding-top: 2%; padding-bottom: 3%; color: #465DA3">CREATE
                A WEMP ACCOUNT</h1>
        </div>
    </section>

    <form action="signup-process.php" method="POST" enctype="multipart/form-data" class="container col-md-5" style="font-family: 'form-font'">
        <!-- FULL NAME -->
        <div class="form-row mb-3">
            <div class="col">
                <input type="text" class="form-control" id="fullName" name="fullName" style="background-color: #F0F2F5; border: none;" placeholder="Full Name" required>
            </div>
        </div>
        <!-- EMAIL ADDRESS -->
        <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" style="background-color: #F0F2F5; border: none" placeholder="Email Address" required>
        </div>
        <!-- ADDRESS LINE 2: REGION, PROVINCE, CITY, BRGY -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <!-- Dropdown -->
                <input type="text" class="form-control" id="region" name="region" style="border-color: #465DA3; background-color: white; border-width: 1px;" placeholder="Region" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="province" name="province" style="border-color: #465DA3; background-color: white; border-width: 1px;" placeholder="Province" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="city" name="city" style="border-color: #465DA3; background-color: white; border-width: 1px;" placeholder="City" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="barangay" name="barangay" style="border-color: #465DA3; background-color: white; border-width: 1px;" placeholder="Barangay" required>
            </div>
        </div>
        <!-- ADDRESS LINE 1: UNIT/BLK/LOT/NO-->
        <div class="form-row">
            <!-- Text Box -->
            <div class="form-group col-md-12">
                <input type="text" class="form-control" id="addressLine1" name="addressLine1" style="background-color: #F0F2F5; border: none" placeholder="Unit/No./Lot/Blk" required>
            </div>
        </div>
        <!-- CATEGORY -->
        <fieldset class="form-group">
            <div class="row">
                <div class="col">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" id="category1" value="Individual">
                        <label class="form-check-label" for="category1" style="color: #465DA3">
                            Individual
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" id="category2" value="Union Representative">
                        <label class="form-check-label" for="category2" style="color: #465DA3">
                            Union Representative
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-row mb-3">
            <!-- WORK POSITION -->
            <div class="col-md-6">
                <input type="text" class="form-control" id="workPosition" name="workPosition" style="background-color: #F0F2F5; border: none" placeholder="Work Position" required>
            </div>
            <!-- YEARS OF SERVICE -->
            <div class="col-md-6">
                <input class="form-control mb-2" id="yearsOfService" name="yearsOfService" type="number" style="background-color: white; border-color: #465DA3; border-width: 1px;" placeholder="No. Year(s) of Service" min="1" required>
            </div>
        </div>

        <div class="form-row mb-3">
            <!-- NATURE OF WORK -->
            <div class="col-md-6">
                <input type="text" class="form-control mb-2" id="natureOfWork" name="natureOfWork" style="background-color: #F0F2F5; border: none" placeholder="Nature of Work" required>
            </div>
            <!-- EMPLOYMENT DATE -->
            <div class="col-md-6">
                <input type="text" class="form-control input-with-icon" id="employmentDate" name="employmentDate" style="background-color: #F0F2F5; border: none;" placeholder="Employment Date" required>
            </div>
        </div>

        <div class="form-row mb-3">
            <!-- USERNAME -->
            <div class="col-md-6">
                <input type="text" class="form-control" id="username" name="username" style="background-color: #F0F2F5; border: none" placeholder="Username" required>
            </div>
            <!-- CONTACT -->
            <div class="col-md-6">
                <input type="text" class="form-control" id="contact" name="contact" style="background-color: #F0F2F5; border: none" placeholder="Contact No." pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="11" required>
            </div>
        </div>
        <div class="form-row mb-3">
            <!-- PASSWORD -->
            <div class="col-md-6">
                <input type="password" class="form-control" id="password" name="password" style="background-color: #F0F2F5; border: none" placeholder="Enter password" minlength="8" required>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" style="background-color: #F0F2F5; border: none" placeholder="Confirm password" minlength="8" required>
            </div>
        </div>

        <div class="upload-container">
            <div class="upload-box" id="uploadSelfie">
                <img src="../assets/selfieID.svg" alt="Selfie Icon" class="upload-icon">
                <input type="file" name="selfie" id="selfieInput" accept="image/*">
                <label for="selfieInput" class="upload-label">Upload a Selfie with ID</label>
                <span id="selfieStatus" class="status-text">No file chosen</span>
            </div>

            <div class="upload-box" id="uploadID">
                <img src="../assets/governmentID.svg" alt="ID Icon" class="upload-icon">
                <input type="file" name="governmentID" id="idInput" accept="image/*">
                <label for="idInput" class="upload-label">Upload a Government ID</label>
                <span id="idStatus" class="status-text">No file chosen</span>
            </div>
        </div>

        <div class="form-row" style="padding-top: 2%">
            <div class="col">
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="termsCheck" required>
                        <label class="form-check-label" for="termsCheck" style="font-size: small">
                            By clicking checkbox, you agree to our <a href="#" data-bs-toggle="modal" data-bs-target="#TermsCondition" style="font-size: small">Terms and Condition</a> and <a href="#" data-bs-toggle="modal" data-bs-target="#PrivacyPolicy" style="font-size: small">Privacy Policy</a>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal for Terms and Conditions-->
        <div class="modal fade" id="TermsCondition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="TermsConditionLabel  `" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class=" modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="TermsConditionLabel" style="font-family: main-font; font-size: 3.5rem; margin-bottom: -5px; padding-left: 35%">WEMP <br>
                            <p style="font-family: Arial, sans serif; font-size: 1.3rem; margin-top: -5px;">Workers and Employers Management Platform</p>
                        </h1>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body">
                        <h2 style="font-family: Arial, sans serif;">Terms & Condition for WEMP</h2><br><br>
                        <h4 style=" font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>General Terms</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp;By accessing and submitting an RFA with Workers and Employers Management Platforms (WEMP), you confirm that you are in agreement with and bound by the terms of services contained in the Terms & Conditions outlined below. These terms apply to the entire website and any email or other type of communication between you and WEMP.
                            Under no circumstances shall WEMP team be liable for any direct, indirect, special, incidental or consequential damages, including, but not limited to, loss of data or profit, arising out of the use, or the inability to use, the materials on this site, even if WEMP team or an authorized representative has been advised of the possibility of such damages. If your use of materials from this site results in the need for servicing, repair or correction of equipment or data, you assume any costs thereof.
                            WEMP will not be responsible for any outcome that may occur during the course of usage of our resources. We reserve the rights to change prices and revise the resources usage policy in any moment.
                        </p><br>
                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>License</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp;WEMP grants you a revocable, non-exclusive, non-transferable, limited license to create an account, and use the website strictly in accordance with the terms of this Agreement. These Terms & Conditions are a contract between you and WEMP ("we," "our," or "us") grants you a revocable, non-exclusive, non-transferable, limited license to download, and use the website strictly in accordance with the terms of this Agreement.
                        </p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Definitions and Key terms</strong></h4>
                        <strong style="font-family: Arial, sans serif; font-size: 1rem;">For this Terms & Conditions:</strong>
                        <ul class="list-group list-group-flush" style="font-family: Arial, sans serif; text-align:justify;">
                            <li class=" list-group-item"><b>Cookie:</b> small amount of data generated by a website and saved by your web browser. It is used to identify your browser, provide analytics, and remember information about you such as your language preference or login information. </li>
                            <li class="list-group-item"><b>Company:</b> when this policy mentions "Company," "we," "us," or "our," it refers to the Worker's Affairs Office, ALERT Center Multipurpose Building that is responsible for your information under this Terms and Condition.</li>
                            <li class="list-group-item"><b>Country:</b> where WEMP or the owners/founders of WEMP are based, in the Philippines.</li>
                            <li class="list-group-item"><b>Customer:</b> refers to the company, organization or person that signs up to use the WEMP Service to manage the relationships with your clients or service users.</li>
                            <li class="list-group-item"><b>Device:</b> any internet connected device such as a phone, tablet, computer or any other device that can be used to visit WEMP and use the services.</li>
                            <li class="list-group-item"><b>IP address:</b> every device connected to the Internet is assigned a number known as an Internet protocol (IP) address. These numbers are usually assigned in geographic blocks. An IP address can often be used to identify the location from which a device is connecting to the Internet.</li>
                            <li class="list-group-item"><b>Personnel:</b> refers to those individuals who are employed by WEMP or are under contract to perform a service on behalf of one of the parties.</li>
                            <li class="list-group-item"><b>Personal Data:</b> any information that directly, indirectly, or in connection with other information - including a personal identification number - allows for the identification or identifiability of a natural person.</li>
                            <li class="list-group-item"><b>Third-party service:</b> refers to advertisers, contest sponsors, promotional and marketing partners, and others who provide our content or whose products or services we think may interest you.</li>
                            <li class="list-group-item"><b>Website:</b> WEMP's site, which can be accessed via this URL: http://localhost/WEMP/user/index.php.</li>
                            <li class="list-group-item"><b>You:</b> a person or entity that is registered with WEMP to use the Services.</li><br>
                        </ul>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Restrictions</strong></h4>
                        <strong style="font-family: Arial, sans serif; font-size: 1rem;">You agree not to, and you will not permit others to:</strong>
                        <ul style="font-family: Arial, sans serif; text-align:justify">
                            <li>License, sell, rent, lease, assign, distribute, transmit, host, outsource, disclose or otherwise commercially exploit the service or make the platform available to any third party.</li>
                            <li>Modify, make derivative works of, disassemble, decrypt, reverse compile or reverse engineer any part of the service.</li>
                            <li>Remove, alter or obscure any proprietary notice (including any notice of copyright or trademark) of or its affiliates, partners, suppliers or the licensors of the service.</li>
                        </ul>
                        <strong style="font-family: Arial, sans serif; font-size: 1rem;">Your Suggestions</strong><br>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            Any feedback, comments, ideas, improvements or suggestions (collectively, "Suggestions") provided by you to us with respect to the service shall remain the sole and exclusive property of us. We shall be free to use, copy, modify, publish, or redistribute the Suggestions for any purpose and in any way without any credit or any compensation to you.</p>
                        <strong style="font-family: Arial, sans serif; font-size: 1rem;">Your Consent</strong><br>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            We've updated our Terms & Conditions to provide you with complete transparency into what is being set when you visit our site and how it's being used. By using our service, registering an account, you hereby consent to our Terms & Conditions.</p>
                        <strong style="font-family: Arial, sans serif; font-size: 1rem;">Links to Other Websites</strong><br>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            Our service may contain links to other websites that are not operated by Us. If You click on a third party link, You will be directed to that third party's site. We strongly advise You to review the Terms & Conditions of every site You visit.
                            We have no control over and assume no responsibility for the content, Terms & Conditions or practices of any third party sites or services.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Changes To Our Terms & Conditions</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; You acknowledge and agree that we may stop (permanently or temporarily) providing the Service (or any features within the Service) to you or to users generally at our sole discretion, without prior notice to you. You may stop using the Service at any time. You do not need to specifically inform us when you stop using the Service.
                            You acknowledge and agree that if we disable access to your account, you may be prevented from accessing the Service, your account details or any files or other materials which are contained in your account. If we decide to change our Terms & Conditions, we will post those changes on this page, and/or update the Terms & Conditions modification date below.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Modifications to Our service</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; We reserve the right to modify, suspend or discontinue, temporarily or permanently, the service or any service to which it connects, with or without notice and without liability to you.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Updates to Our service</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; We may from time to time provide enhancements or improvements to the features/ functionality of the service, which may include patches, bug fixes, updates, upgrades and other modifications ("Updates"). Updates may modify or delete certain features and/or functionalities of the service. You agree that we have no obligation to (i) provide any Updates, or (ii) continue to provide or enable any particular features and/or functionalities of the service to you.
                            You further agree that all Updates will be (i) deemed to constitute an integral part of the service, and (ii) subject to the terms and conditions of this Agreement.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Third-Party Services</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; We may display, include or make available third-party content (including data, information, applications and other products services) or provide links to third-party websites or services ("Third-Party Services").
                            You acknowledge and agree that we shall not be responsible for any Third-Party Services, including their accuracy, completeness, timeliness, validity, copyright compliance, legality, decency, quality or any other aspect thereof. We do not assume and shall not have any liability or responsibility to you or any other person or entity for any Third-Party Services.
                            Third-Party Services and links thereto are provided solely as a convenience to you and you access and use them entirely at your own risk and subject to such third parties' terms and conditions.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Term and Termination</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; This Agreement shall remain in effect until terminated by you or us. We may, in its sole discretion, at any time and for any or no reason, suspend or terminate this Agreement with or without prior notice. This Agreement will terminate immediately, without prior notice from us, in the event that you fail to comply with any provision of this Agreement. You may also terminate this Agreement by deleting the service and all copies thereof from your computer. Upon termination of this Agreement, you shall cease all use of the service and delete all copies of the service from your computer.
                            Termination of this Agreement will not limit any of our rights or remedies at law or in equity in case of breach by you (during the term of this Agreement) of any of your obligations under the present Agreement.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Copyright Infringement Notice</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; If you are a copyright owner or such owner's agent and believe any material from us constitutes an infringement on your copyright, please contact us setting forth the following information: (a) a physical or electronic signature of the copyright owner or a person authorized to act on his behalf; (b) identification of the material that is claimed to be infringing; (c) your contact information, including your address, telephone number, and an email;
                            (d) a statement by you that you have a good faith belief that use of the material is not authorized by the copyright owners; and (e) the a statement that the information in the notification is accurate, and, under penalty of perjury you are authorized to act on behalf of the owner.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Indemnification</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; You agree to indemnify and hold us and our parents, subsidiaries, affiliates, officers, employees, agents, partners and licensors (if any) harmless from any claim or demand, including reasonable attorneys' fees, due to or arising out of your: (a) use of the service; (b) violation of this Agreement or any law or regulation; or (c) violation of any right of a third party.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Limitation of Liability</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; Notwithstanding any damages that you might incur, the entire liability of us and any of our suppliers under any provision of this Agreement and your exclusive remedy for all of the foregoing shall be limited to the amount actually paid by you for the service. To the maximum extent permitted by applicable law, in no event shall we or our suppliers be liable for any special, incidental, indirect, or consequential damages whatsoever (including, but not limited to, damages for loss of profits, for loss of data or other information, for business interruption, for personal injury, for loss of privacy arising out of or in any way related to the use of or inability to use the service, third-party software and/or third-party hardware used with the service, or otherwise in connection with any provision of this Agreement),
                            even if we or any supplier has been advised of the possibility of such damages and even if the remedy fails of its essential purpose.
                            Some states/jurisdictions do not allow the exclusion or limitation of incidental or consequential damages, so the above limitation or exclusion may not apply to you.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Severability</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; If any provision of this Agreement is held to be unenforceable or invalid, such provision will be changed and interpreted to accomplish the objectives of such provision to the greatest extent possible under applicable law and the remaining provisions will continue in full force and effect.<br><br>
                            This Agreement, together with the Privacy Policy and any other legal notices published by us on the Services, shall constitute the entire agreement between you and us concerning the Services. If any provision of this Agreement is deemed invalid by a court of competent jurisdiction, the invalidity of such provision shall not affect the validity of the remaining provisions of this Agreement, which shall remain in full force and effect. No waiver of any term of this Agreement shall be deemed a further or continuing waiver of such term or any other term, and our failure to assert any right or provision under this Agreement shall not constitute a waiver of such right or provision.
                            <b>YOU AND US AGREE THAT ANY CAUSE OF ACTION ARISING OUT OF OR RELATED TO THE SERVICES MUST COMMENCE WITHIN ONE (1) YEAR AFTER THE CAUSE OF ACTION ACCRUES. OTHERWISE, SUCH CAUSE OF ACTION IS PERMANENTLY BARRED.</b>
                        </p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Waiver</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; Except as provided herein, the failure to exercise a right or to require performance of an obligation under this Agreement shall not affect a party's ability to exercise such right or require such performance at any time thereafter nor shall the waiver of a breach constitute waiver of any subsequent breach.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Amendments to this Agreement</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; We reserve the right, at its sole discretion, to modify or replace this Agreement at any time. If a revision is material we will provide at least 30 days' notice prior to any new terms taking effect.
                            What constitutes a material change will be determined at our sole discretion. By continuing to access or use our service after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use our service.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Entire Agreement</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; The Agreement constitutes the entire agreement between you and us regarding your use of the service and supersedes all prior and contemporaneous written or oral agreements between you and us. You may be subject to additional
                            terms and conditions that apply when you use or purchase other services from us, which we will provide to you at the time of such use or purchase.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Updates to Our Terms</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; We may change our Service and policies, and we may need to make changes to these Terms so that they accurately reflect our Service and policies. Unless otherwise required by law, we will notify you (for example, through our Service) before we make changes to these Terms and give you an opportunity to review them before they go into effect.
                            Then, if you continue to use the Service, you will be bound by the updated Terms. If you do not want to agree to these or any updated Terms, you can delete your account.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Intellectual Property</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; Our platform and its entire contents, features and functionality (including but not limited to all information, software, text, displays, images, video and audio, and the design, selection and arrangement thereof), are owned by us, its licensors or other providers of such material and are protected by Philippines and international copyright, trademark, patent, trade secret and other intellectual property or proprietary rights laws.
                            The material may not be copied, modified, reproduced, downloaded or distributed in any way, in whole or in part, without the express prior written permission of us, unless and except as is expressly provided in these Terms & Conditions. Any unauthorized use of the material is prohibited.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Agreement to Arbitrate</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; This section applies to any dispute <b>EXCEPT IT DOESN'T INCLUDE A DISPUTE RELATING TO CLAIMS FOR INJUNCTIVE OR EQUITABLE RELIEF REGARDING THE ENFORCEMENT OR VALIDITY OF YOUR OR 's INTELLECTUAL PROPERTY RIGHTS.</b> The term "dispute" means any dispute, action, or other controversy between you and us concerning the Services or this agreement, whether in contract, warranty, tort, statute, regulation, ordinance, or any other legal or equitable basis.
                            "Dispute” will be given the broadest possible meaning allowable under law.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Notice of Dispute</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; In the event of a dispute, you or us must give the other a Notice of Dispute, which is a written statement that sets forth the name, address, and contact information of the party giving it, the facts giving rise to the dispute, and the relief requested. You must send any Notice of Dispute via email to: <b>waovalcity@gmail.com</b>.
                            We will send any Notice of Dispute to you by mail to your address if we have it, or otherwise to your email address. You and us will attempt to resolve any dispute through informal negotiation within sixty (60) days from the date the Notice of Dispute is sent. After sixty (60) days, you or us may commence arbitration.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Binding Arbitration</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; If you and us don't resolve any dispute by informal negotiation, any other effort to resolve the dispute will be conducted exclusively by binding arbitration as described in this section. You are giving up the right to litigate (or participate in as a party or class member) all disputes in court before a judge or jury.
                            The dispute shall be settled by binding arbitration in accordance with the commercial arbitration rules of the American Arbitration Association. Either party may seek any interim or preliminary injunctive relief from any court of competent jurisdiction, as necessary to protect the party's rights or property pending the completion of arbitration. Any and all legal, accounting, and other costs, fees, and expenses incurred by the prevailing party shall be borne by the non-prevailing party.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Submissions and Privacy</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; In the event that you submit or post any ideas, creative suggestions, designs, photographs, information, advertisements, data or proposals, including ideas for new or improved products, services, features, technologies or promotions, you expressly agree that such submissions will automatically be treated as non-confidential and non-proprietary and will become the sole property of us without any compensation or credit to you whatsoever.
                            We and our affiliates shall have no obligations with respect to such submissions or posts and may use the ideas contained in such submissions or posts for any purposes in any medium in perpetuity, including, but not limited to, developing, manufacturing, and marketing products and services using such ideas.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Miscellaneous</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            If for any reason a court of competent jurisdiction finds any provision or portion of these Terms & Conditions to be unenforceable, the remainder of these Terms & Conditions will continue in full force and effect. Any waiver of any provision of these Terms & Conditions will be effective only if in writing and signed by an authorized representative of us. We will be entitled to injunctive or other equitable relief (without the obligations of posting any bond or surety) in the event of any breach or anticipatory breach by you.
                            We operate and control our Service from our office in Valenzuela. The Service is not intended for distribution to or use by any person or entity in any jurisdiction or country where such distribution or use would be contrary to law or regulation. Accordingly, those persons who choose to access our Service from other locations do so on their own initiative and are solely responsible for compliance with local laws, if and to the extent local laws are applicable. These Terms & Conditions (which include and incorporate our Privacy Policy) contains the entire understanding, and supersedes all prior understandings, between you and us concerning its subject matter, and cannot be changed or modified by you. The section headings used in this Agreement are for convenience only and will not be given any legal import.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Disclaimer</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;&nbsp; We are not responsible for any content, code or any other imprecision. We do not provide guarantees. In no event shall we be liable for any special, direct, indirect, consequential, or incidental damages or any damages whatsoever, whether in an action of contract, negligence or other tort, arising out of or in connection with the use of the Service or the contents of the Service. We reserve the right to make additions, deletions, or modifications to the contents on the Service at any time without prior notice.<br><br>
                            Our Service and its contents are provided "as is" and "as available" without any representations of any kind, whether express or implied. We are a distributor and not a publisher of the content supplied by third parties; as such, our exercise no editorial control over such content and makes no warranty or representation as to the accuracy, reliability or currency of any information, content, service provided through or accessible via our Service. Without limiting the foregoing, We specifically disclaim all warranties and representations in any content transmitted on or in connection with our Service or on sites that may appear as links on our Service, or otherwise in connection with, our Service, fitness for a particular purpose or non-infringement of third party rights. No oral advice or written information given by us or any of its affiliates, employees, officers, directors, agents, or the like will create an affirmation.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem;"><strong>Contact Us</strong></h4>
                        <strong style="font-family: Arial, sans serif; font-size: 1rem;">
                            Don't hesitate to contact us if you have any questions.</strong>
                        <ul>
                            <li>Via Email: waovalcity@gmail.com</li>
                            <li>Via Phone Number: 0977 847 2926</li>
                            <li>Via this Link: http://localhost/WEMP/user/index.php</li>
                        </ul>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">I Agree</button>
                        <button type="button" class="btn btn-secondary">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal for Privacy Policy-->
        <div class="modal fade" id="PrivacyPolicy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="PrivacyPolicyLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class=" modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="PrivacyPolicyLabel" style="font-family: main-font; font-size: 3.5rem; margin-bottom: -5px; padding-left: 35%">WEMP <br>
                            <p style="font-family: Arial, sans serif; font-size: 1.3rem; margin-top: -5px;">Workers and Employers Management Platform</p>
                        </h1>

                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                    </div>

                    <div class="modal-body">
                        <h2 style="font-family: Arial, sans serif;">Privacy Policy</h2><br>
                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Introduction</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;Welcome to the <b>Worker's Affairs Office of Valenzuela!.</b><br><br>
                            &nbsp;&nbsp;&nbsp;<b>The Worker's Affairs Office of Valenzuela</b> (“us”, “we”, or “our”) operates <b>wao.gov.ph</b> (hereinafter referred to as “<b>Service</b>”).<br>
                            Our Privacy Policy governs your visit to <b>wao.gov.ph</b>, and explains how we collect, safeguard and disclose information that results from your use of our Service.<br><br>
                            &nbsp;&nbsp;&nbsp;We use your data to provide and improve Service. By using Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, the terms used in this Privacy Policy have the same meanings as in our Terms and Conditions.
                            Our Terms and Conditions (“<b>Terms</b>”) govern all use of our Service and together with the Privacy Policy constitutes your agreement with us (“<b>Agreement</b>”).<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Definitions</strong></h4>
                        <ul class="list-group list-group-flush" style="font-family: Arial, sans serif; text-align:justify;">
                            <li class=" list-group-item"><b>Service</b> means the wao.gov.ph website operated by Worker's Affairs Office of Valenzuela.</li>
                            <li class=" list-group-item"><b>Personal Data</b> means data about a living individual who can be identified from those data (or from those and other information either in our possession or likely to come into our possession).</li>
                            <li class=" list-group-item"><b>Usage Data</b> is data collected automatically either generated by the use of Service or from Service infrastructure itself (for example, the duration of a page visit).</li>
                            <li class=" list-group-item"><b>Cookies</b> are small files stored on your device (computer or mobile device).</li>
                            <li class=" list-group-item"><b>Data Controller</b> means a natural or legal person who (either alone or jointly or in common with other persons) determines the purposes for which and the manner in which any personal data are, or are to be, processed. For the purpose of this Privacy Policy, we are a Data Controller of your data.</li>
                            <li class=" list-group-item"><b>Data Processors (or Service Providers)</b> means any natural or legal person who processes the data on behalf of the Data Controller. We may use the services of various Service Providers in order to process your data more effectively.</li>
                            <li class=" list-group-item"><b>Data Subject</b> is any living individual who is the subject of Personal Data.</li>
                            <li class=" list-group-item"><b>The User</b> is the individual using our Service. The User corresponds to the Data Subject, who is the subject of Personal Data.</li><br><br>
                        </ul>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Information Collection and Use</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We collect several different types of information for various purposes to provide and improve our Service to you.</p><br>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Types of Data Collected</strong></h4>
                        <strong style="font-family: Arial, sans serif; font-size: 1rem;">Personal Data</strong>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you (“<b>Personal Data</b>”). Personally identifiable information may include, but is not limited to:<br>
                        <ul>
                            0.1. Email address<br>
                            0.2. First name and last name<br>
                            0.3. Phone number<br>
                            0.4. Address, Country, State, Province, ZIP/Postal code, City<br>
                            0.5. Cookies and Usage Data<br>
                        </ul>
                        &nbsp;&nbsp;&nbsp;We may use your Personal Data to contact you with newsletters, marketing or promotional materials and other information that may be of interest to you.
                        You may opt out of receiving any, or all, of these communications from us by following the unsubscribe link.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Usage Data</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We may also collect information that your browser sends whenever you visit our Service or when you access Service by or through any device <br>(“<b>Usage Data</b>”).
                            This Usage Data may include information such as your computer’s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.<br><br>
                            &nbsp;&nbsp;&nbsp;When you access Service with a device, this Usage Data may include information such as the type of device you use, your device unique ID, the IP address of your device, your device operating system, the type of Internet browser you use, unique device identifiers and other diagnostic data.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Location Data</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We may use and store information about your location if you give us permission to do so (“<b>Location Data</b>”). We use this data to provide features of our Service, to improve and customize our Service.
                            You can enable or disable location services when you use our Service at any time by way of your device settings.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Tracking Cookies Data</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We use cookies and similar tracking technologies to track the activity on our Service and we hold certain information.<br><br>
                            &nbsp;&nbsp;&nbsp;Cookies are files with a small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Other tracking technologies are also used such as beacons, tags and scripts to collect and track information and to improve and analyze our Service.
                            You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.<br><br>
                            &nbsp;&nbsp;&nbsp;Examples of Cookies we use:
                        <ul style="font-family: Arial, sans serif; text-align:justify">
                            0.1. <b>Session Cookies:</b> We use Session Cookies to operate our Service.<br>
                            0.2. <b>Preference Cookies:</b> We use Preference Cookies to remember your preferences and various settings.<br>
                            0.3. <b>Security Cookies:</b> We use Security Cookies for security purposes.<br>
                            0.4. <b>Advertising Cookies:</b> Advertising Cookies are used to serve you with advertisements that may be relevant to you and your interests.<br>
                            <b>Other Data</b><br>
                            While using our Service, we may also collect the following information: sex, age, date of birth, place of birth, passport details, citizenship, registration at place of residence and actual address, telephone number (work, mobile),
                            details of documents on education, qualification, professional training, employment agreements, NDA agreements, information on bonuses and compensation, information on marital status, family members, social security (or other taxpayer identification) number, office location and other data.<br><br>
                        </ul>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Use of Data</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;Worker's Affairs Office of Valenzuela uses the collected data for various purposes:
                        <ul style="font-family: Arial, sans serif; text-align:justify">
                            0.1. to provide and maintain our Service;<br>
                            0.2. to notify you about changes to our Service;<br>
                            0.3. to allow you to participate in interactive features of our Service when you choose to do so;<br>
                            0.4. to provide customer support;<br>
                            0.5. to gather analysis or valuable information so that we can improve our Service;<br>
                            0.6. to monitor the usage of our Service;<br>
                            0.7. to detect, prevent and address technical issues;<br>
                            0.8. to fulfill any other purpose for which you provide it;<br>
                            0.9. to carry out our obligations and enforce our rights arising from any contracts entered into between you and us, including for billing and collection;<br>
                            0.10. to provide you with notices about your account and/or subscription, including expiration and renewal notices, email-instructions, etc.;<br>
                            0.11. to provide you with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless you have opted not to receive such information;<br>
                            0.12. in any other way we may describe when you provide the information;<br>
                            0.13. for any other purpose with your consent.<br><br>
                        </ul>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Retention of Data</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We will retain your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies. <br><br>
                            &nbsp;&nbsp;&nbsp;We will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period, except when this data is used to strengthen the security or to improve the functionality of our Service, or we are legally obligated to retain this data for longer time periods.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Transfer of Data</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;Your information, including Personal Data, may be transferred to – and maintained on – computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ from those of your jurisdiction.<br>
                            If you are located outside the Philippines and choose to provide information to us, please note that we transfer the data, including Personal Data, to the Philippines and process it there. Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.<br><br>
                            &nbsp;&nbsp;&nbsp;Worker's Affairs Office of Valenzuela will take all the steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Disclosure of Data</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We may disclose personal information that we collect, or you provide:<br><br>
                            &nbsp;&nbsp;&nbsp;0.1. <b>Disclosure for Law Enforcement.</b><br>
                            &nbsp;&nbsp;&nbsp;Under certain circumstances, we may be required to disclose your Personal Data if required to do so by law or in response to valid requests by public authorities.<br>
                            &nbsp;&nbsp;&nbsp;0.2. <b>Business Transaction.</b><br>
                            &nbsp;&nbsp;&nbsp;If we or our subsidiaries are involved in a merger, acquisition or asset sale, your Personal Data may be transferred.<br>
                            &nbsp;&nbsp;&nbsp;0.3. <b>Other cases. We may disclose your information also:</b>
                        <ul style="font-family: Arial, sans serif; text-align:justify">
                            0.3.1. to our subsidiaries and affiliates;<br>
                            0.3.2. to contractors, service providers, and other third parties we use to support our business;<br>
                            0.3.3. to fulfill the purpose for which you provide it;<br>
                            0.3.4. for the purpose of including your company’s logo on our website;<br>
                            0.3.5. for any other purpose disclosed by us when you provide the information;<br>
                            0.3.6. with your consent in any other cases;<br>
                            0.3.7. if we believe disclosure is necessary or appropriate to protect the rights, property, or safety of the Company, our customers, or others.<br><br>
                        </ul>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Security of Data</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Your Data Protection Rights Under General Data Protection Regulation (GDPR)</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;If you are a resident of the European Union (EU) and European Economic Area (EEA), you have certain data protection rights, covered by GDPR.<br>
                            We aim to take reasonable steps to allow you to correct, amend, delete, or limit the use of your Personal Data. If you wish to be informed what Personal Data we hold about you and if you want it to be removed from our systems, please email us at <b>waovalcity@gmail.com</b>.<br><br>
                            &nbsp;&nbsp;&nbsp;In certain circumstances, you have the following data protection rights:
                        <ul style="font-family: Arial, sans serif; text-align:justify">
                            0.1. the right to access, update or to delete the information we have on you;<br>
                            0.2. the right of rectification. You have the right to have your information rectified if that information is inaccurate or incomplete;<br>
                            0.3. the right to object. You have the right to object to our processing of your Personal Data;<br>
                            0.4. the right of restriction. You have the right to request that we restrict the processing of your personal information;<br>
                            0.5. the right to data portability. You have the right to be provided with a copy of your Personal Data in a structured, machine-readable and commonly used format;<br>
                            0.6. the right to withdraw consent. You also have the right to withdraw your consent at any time where we rely on your consent to process your personal information;<br>
                        </ul>
                        &nbsp;&nbsp;&nbsp;Please note that we may ask you to verify your identity before responding to such requests. Please note, we may not be able to provide Service without some necessary data.
                        You have the right to complain to a Data Protection Authority about our collection and use of your Personal Data. For more information, please contact your local data protection authority in the European Economic Area (EEA).<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Your Data Protection Rights under the California Privacy Protection Act (CalOPPA)</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;CalOPPA is the first state law in the nation to require commercial websites and online services to post a privacy policy. The law’s reach stretches well beyond California to require a person or company in the United States (and conceivable the world) that operates websites collecting personally identifiable information from California consumers to post a conspicuous privacy policy on its website stating exactly the information being collected and those individuals with whom it is being shared, and to comply with this policy.<br><br>
                            &nbsp;&nbsp;&nbsp;According to CalOPPA we agree to the following:
                        <ul style="font-family: Arial, sans serif; text-align:justify">
                            0.1. users can visit our site anonymously;<br>
                            0.2. our Privacy Policy link includes the word “Privacy”, and can easily be found on the homepage of our website;<br>
                            0.3. users will be notified of any privacy policy changes on our Privacy Policy Page;<br>
                            0.4. users are able to change their personal information by emailing us at <b>waovalcity@gmail.com</b>.<br><br>
                        </ul>
                        &nbsp;&nbsp;&nbsp;Our Policy on “<b style="font-family: Arial, sans serif; text-align:justify">Do Not Track</b>” Signals:<br>
                        &nbsp;&nbsp;&nbsp;We honor Do Not Track signals and do not track, plant cookies, or use advertising when a Do Not Track browser mechanism is in place. Do Not Track is a preference you can set in your web browser to inform websites that you do not want to be tracked.
                        You can enable or disable Do Not Track by visiting the Preferences or Settings page of your web browser.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Your Data Protection Rights under the California Consumer Privacy Act (CCPA)</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;If you are a California resident, you are entitled to learn what data we collect about you, ask to delete your data and not to sell (share) it. To exercise your data protection rights, you can make certain requests and ask us:<br><br>
                            <b>0.1. What personal information we have about you. If you make this request, we will return to you:</b><br>
                        <ul style="font-family: Arial, sans serif; text-align:justify">
                            0.0.1. The categories of personal information we have collected about you.<br>
                            0.0.2. The categories of sources from which we collect your personal information.<br>
                            0.0.3. The business or commercial purpose for collecting or selling your personal information.<br>
                            0.0.4. The categories of third parties with whom we share personal information.<br>
                            0.0.5. The specific pieces of personal information we have collected about you.<br>
                            0.0.6. A list of categories of personal information that we have sold, along with the category of any other company we sold it to. If we have not sold your personal information, we will inform you of that fact.<br>
                            0.0.7. A list of categories of personal information that we have disclosed for a business purpose, along with the category of any other company we shared it with.<br>
                        </ul>
                        Please note, you are entitled to ask us to provide you with this information up to two times in a rolling twelve-month period. When you make this request, the information provided may be limited to the personal information we collected about you in the previous 12 months.<br><br>
                        <b style="font-family: Arial, sans serif; text-align:justify">0.2. To delete your personal information. If you make this request, we will delete the personal information we hold about you as of the date of your request from our records and direct any service providers to do the same. In some cases, deletion may be accomplished through de-identification of the information. If you choose to delete your personal information, you may not be able to use certain functions that require your personal information to operate.</b><br><br>
                        <b style="font-family: Arial, sans serif; text-align:justify">0.3. To stop selling your personal information. We don’t sell or rent your personal information to any third parties for any purpose. We do not sell your personal information for monetary consideration. However, under some circumstances, a transfer of personal information to a third party, or within our family of companies, without monetary consideration may be considered a “sale” under California law. You are the only owner of your Personal Data and can request disclosure or deletion at any time.</b><br><br>
                        &nbsp;&nbsp;&nbsp;If you submit a request to stop selling your personal information, we will stop making such transfers.<br>
                        &nbsp;&nbsp;&nbsp;Please note, if you ask us to delete or stop selling your data, it may impact your experience with us, and you may not be able to participate in certain programs or membership services which require the usage of your personal information to function. But in no circumstances, we will discriminate against you for exercising your rights. To exercise your California data protection rights described above, please send your request(s) by email: <b>waovalcity@gmail.com</b>.<br>
                        Your data protection rights, described above, are covered by the CCPA, short for the California Consumer Privacy Act. To find out more, visit the official California Legislative Information website. The CCPA took effect on 01/01/2020.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Service Providers</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We may employ third party companies and individuals to facilitate our Service (“<b>Service Providers</b>”), provide Service on our behalf, perform Service-related services or assist us in analyzing how our Service is used.
                            These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Analytics</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We may use third-party Service Providers to monitor and analyze the use of our Service.<br><br></p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>CI/CD tools</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We may use third-party Service Providers to automate the development process of our Service.<br><br></p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Behavioral Remarketing</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We may use remarketing services to advertise on third party websites to you after you visited our Service.
                            We and our third-party vendors use cookies to inform, optimize and serve ads based on your past visits to our Service.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Links to Other Sites</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;Our Service may contain links to other sites that are not operated by us. If you click a third party link, you will be directed to that third party’s site. We strongly advise you to review the Privacy Policy of every site you visit.<br><br>
                            We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Children’s Privacy</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;Our Services are not intended for use by children under the age of 18.<br>
                            We do not knowingly collect personally identifiable information from Children under 18. If you become aware that a Child has provided us with Personal Data, please contact us.
                            If we become aware that we have collected Personal Data from Children without verification of parental consent, we take steps to remove that information from our servers.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Changes to This Privacy Policy</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.<br>
                            We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update “effective date” at the top of this Privacy Policy.<br>
                            &nbsp;&nbsp;&nbsp;You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.<br><br>
                        </p>

                        <h4 style="font-family: Arial, sans serif; font-size: 1.3rem; text-align:justify; margin: 0;"><strong>Contact Us</strong></h4>
                        <p style="font-family: Arial, sans serif; text-align:justify">
                            &nbsp;&nbsp;&nbsp;If you have any questions about this Privacy Policy, please contact us by email: <b>waovalcity@gmail.com</b>.<br></p>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">I Agree</button>
                        <button type="button" class="btn btn-secondary">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Submit button -->
        <div class="form-row">
            <div class="col text-center">
                <button type="submit" class="btn" style="background-color: #007BFF; color: white; height: 100%; font-weight: bold" onmouseover="this.style.backgroundColor='#0E72DE';" onmouseout="this.style.backgroundColor='#007BFF';">
                    Sign Up
                </button>
            </div>
        </div>

        <div class="already-have-account text-start" style="padding-bottom: 10%; padding-top: 2%">
            <p>Already have an account? <a href="../public/login.php" class="login">Login</a></p>
        </div>
    </form>

    <footer class="footer" style="background-color: #26272B;">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>

</body>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- Employment Date BOOTSTRAP for Click -->
<script>
    $(document).ready(function() {
        $('#employmentDate').datepicker({
            format: 'yyyy-mm-dd', // Change the format as needed
            autoclose: true
        });
    });
</script>

<!-- VALIDATION OF TERMS AND CONDITION CHECKBOX -->
<script>
    function validateForm() {
        var checkBox = document.getElementById("termsCheck");
        if (!checkBox.checked) {
            checkBox.classList.add("is-invalid");
            return false;
        }
        return true;
    }
</script>

<script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.3.js"></script>


<script type="text/javascript">
    var my_handlers = {
        fill_provinces: function() {
            console.log('Region changed');
            var region_code = $("option:selected", this).data('psgc-code');
            $('#province').ph_locations('fetch_list', [{
                "filter": {
                    "region_code": region_code
                }
            }]);
        },

        fill_cities: function() {
            console.log('Province changed');
            var province_code = $("option:selected", this).data('psgc-code');
            $('#city').ph_locations('fetch_list', [{
                "filter": {
                    "province_code": province_code
                }
            }]);
        },

        fill_barangays: function() {
            console.log('City changed');
            var city_code = $("option:selected", this).data('psgc-code');
            var province_code = $("#province option:selected").data('psgc-code');
            $('#barangay').ph_locations('fetch_list', [{
                "filter": {
                    "city_code": city_code
                }
            }]);
        }
    };

    $(function() {
        $('#region').on('change', my_handlers.fill_provinces);
        $('#province').on('change', my_handlers.fill_cities);
        $('#city').on('change', my_handlers.fill_barangays);

        $('#region').ph_locations({
            'location_type': 'regions'
        });
        $('#province').ph_locations({
            'location_type': 'provinces'
        });
        $('#city').ph_locations({
            'location_type': 'cities'
        });
        $('#barangay').ph_locations({
            'location_type': 'barangays'
        });

        $('#region').ph_locations('fetch_list', [{
            'location_type': 'regions',
            "selected_value": "Select Region"
        }]);
        $('#province').ph_locations('fetch_list', [{
            'location_type': 'provinces',
            "selected_value": "Select Province"
        }]);
        $('#city').ph_locations('fetch_list', [{
            'location_type': 'cities',
            "selected_value": "Select City"
        }]);
        $('#barangay').ph_locations('fetch_list', [{
            'location_type': 'barangays',
            "selected_value": "Select Barangay"
        }]);
    });

    document.getElementById('selfieInput').addEventListener('change', function() {
        const selfieStatus = document.getElementById('selfieStatus');
        selfieStatus.textContent = this.files.length > 0 ? this.files[0].name : 'No file chosen';
    });

    document.getElementById('idInput').addEventListener('change', function() {
        const idStatus = document.getElementById('idStatus');
        idStatus.textContent = this.files.length > 0 ? this.files[0].name : 'No file chosen';
    });
</script>

</body>

</html>