<!-- PREVENT FROM ACCCESS NA NAKALOG OUT KA NA -->
<?php
include 'auth.php';
checkLogin();

$accountID = $_SESSION['accountID'];

include 'rfa-verification-process.php';
checkRFA($accountID);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFA</title>
    <link rel="stylesheet" href="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Style -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        .notification-panel {
            width: 20%;
            position: absolute;
            left: 72%;
            top: 5%;
            max-height: 400px;
            overflow-y: auto;
            font-family: Arial;
            z-index: 9999;
        }

        /* PUSH NOTIFICATIONS */
        .notification-list {
            list-style-type: none;
            padding: 0;
        }

        .notification-list li {
            background-color: #f5f5f5;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .notification-list li:hover {
            background-color: #e0e0e0;
            cursor: pointer;
        }

        /* Ensure collapsible content is fixed when collapsed */
        #collapseNotifications:not(.show) {
            position: fixed;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #C80000;">
        <div class="container">
            <a class="navbar-brand" href="../user/home.php">
                <img src="../assets/WAO-Logo.svg" alt="Header-Title" style="width: 300px; height: 80px;">
            </a>
            <button style="width: 10%; height: 50%; background-color: #fff; border: none;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color: #C80000;"></span>
            </button>
            <div class="collapse navbar-collapse navbar-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mr-5">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/rfa.php">RFA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/dashboard-status.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../user/contact-us.php">Contact</a>
                    </li>
                    <div class="mr-5"></div>
                </ul>
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#collapseNotifications" aria-expanded="false" aria-controls="collapseNotifications">
                                <img src="../assets/Bell_Pin.svg" alt="Notification" style="width: 20px; height: 20px; margin-right: 5px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../user/my-account.php">
                                <img src="../assets/User.svg" alt="My-Account" style="width: 20px; height: 20px; margin-right: 5px;">
                                My Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" onclick="showLogoutConfirmation()">
                                <img src="../assets/Sign_out_square.svg" alt="Sign-out" style="width: 20px; height: 20px; margin-right: 5px;">
                                Log Out
                            </a>
                        </li>
                    </ul>
                </div>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Collapsible content -->
    <div class="collapse position-fixed" style="width: 20%; left: 65%; top: 0; max-height: 400px; overflow-y: auto; font-family: Arial; padding-top: 5%; z-index: 9999;" id="collapseNotifications">
        <div class="card card-body">
            <ul class="notification-list">
                <!-- Example notifications -->
                <li>No notifications</li>
            </ul>
        </div>
    </div>

    <section class="title-sec">
        <div class="container mt-5">
            <a href="#" class="mt-5 d-flex justify-content-start" onclick="showBackConfirmationModal()">
                <img src="../assets/Expand_left.svg" alt="Back-Button" style="width: 3rem; height: 3rem;">
            </a>
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center" style="margin-bottom: -10px;">
                    <h1 class="display-2 mb-2" style="font-family: main-font; font-size: 3.5rem; margin-bottom: -5px; padding-top: 5%">
                        WEMP</h1>
                    <p class="display-2 mb-0" style="font-family: Arial, sans serif; font-size: 1.3rem; margin-top: -5px;">Workers and
                        Employers Management Platform</p>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="backConfirmationModal" tabindex="-1" aria-labelledby="backConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-center" id="backConfirmationModalLabel">Confirmation</h5>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to go back?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="goBack()">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container d-flex justify-content-center mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="scrollable-container" style="background-color: whitesmoke;">
                    <div class="scrollable-content">
                        <!-- Your content goes here -->
                        <div style="position: sticky; top: 0; background-color: whitesmoke; padding: 10px; width:100%">
                            <h3 class="display-7" style="font-family: sub-font-bold; margin: 0;">Terms & Condition for WEMP</h3>
                        </div>
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
                </div>
                <div class="text-right mt-4 justify-content-end align-items-end" style="width: 30%; margin-left: 69%;">
                    <a href="../user/rfa-form.php">
                        <button type="button" id="proceedBtn" class="btn btn-sm" style="background-color: black; color: white;  border-radius: 50px;">Proceed</button>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <footer class="footer">
        <div class="container-footer">
            <p class="text-muted">Copyright 2024 © All Rights Reserved</br>
                Worker’s Affairs Office</p>
        </div>
    </footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>


<script>
    function showLogoutConfirmation() {
        $('#logoutConfirmationModal').modal('show');
    }

    function logout() {
        window.location.href = "logout.php";
    }

    $(document).ready(function() {
        var $collapseElement = $('#collapseNotifications');
        var bsCollapse = new bootstrap.Collapse($collapseElement[0], {
            toggle: false
        });

        $('#collapseNotifications').on('click', function(event) {
            event.preventDefault();
            if ($collapseElement.hasClass('show')) {
                bsCollapse.hide();
            } else {
                bsCollapse.show();
            }
        });
    });
</script>

</html>