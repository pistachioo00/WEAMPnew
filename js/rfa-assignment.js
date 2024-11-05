//Initialize popovers
var popoverTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl);
});

// Function to show the logout confirmation modal
function showLogoutConfirmation() {
  const modalElement = document.getElementById("logoutConfirmationModal");
  const modal = new bootstrap.Modal(modalElement);
  modal.show();
}

// Function to handle logout
function logout() {
  window.location.href = "logout.php"; // Redirect to logout page
}

// Get the checkbox and the text box container elements
const checkbox = document.getElementById("flexCheckOthers");
const otherTextContainer = document.getElementById("otherTextContainer");

// Listen for checkbox changes
checkbox.addEventListener("change", function () {
  if (this.checked) {
    // Show the text box if checkbox is checked
    otherTextContainer.style.display = "block";
  } else {
    // Hide the text box if checkbox is unchecked
    otherTextContainer.style.display = "none";
  }
});

// This is for updating the status to APPROVED without affecting the process and visibility of Approved Modal
function approveAction() {
  const referenceID = document.getElementById("referenceID").value;

  // Send data to the new PHP file using AJAX (Fetch API)
  fetch("approve-update.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams({
      referenceID: referenceID,
    }),
  })
    .then((response) => {
      if (!response.ok) throw new Error("Network response was not ok");
      return response.text(); // or response.json() if you return JSON
    })
    .then((data) => {
      console.log(data); // Process the response if necessary
      // Optionally, show a success message or take further action
      alert("Record approved successfully!");
    })
    .catch((error) => {
      console.error("There was a problem with the fetch operation:", error);
    });
}

// Function to show the modal
function showRejectModal() {
  var modal = new bootstrap.Modal(document.getElementById("staticBackdrop"));
  modal.show();
}

// Function to toggle visibility of the 'Other' text field
function toggleOtherText() {
  var otherTextContainer = document.getElementById("otherTextContainer");
  var otherCheckbox = document.getElementById("flexCheckOthers");
  otherTextContainer.style.display = otherCheckbox.checked ? "block" : "none";
}

// Function to submit the form inside the modal
function submitRejectionForm() {
  document.getElementById("rejectionForm").submit();
}

//  jQuery Script
$(document).ready(function () {
  $("#sendButton").on("click", function () {
    const checkboxes = $(".form-check-input");
    const remarks = $("#message-text").val().trim();
    let isChecked = false;

    // Check if at least one checkbox is checked
    checkboxes.each(function () {
      if ($(this).is(":checked")) {
        isChecked = true;
      }
    });

    if (!isChecked) {
      alert("Please select at least one reason for rejection.");
      return;
    }

    if (remarks === "") {
      alert("Please provide remarks.");
      return;
    }

    // If all validations pass, submit the form
    alert("Form submitted successfully!"); // For demonstration

    // Close the modal after successful submission
    $("#staticBackdrop").modal("hide");

    // Uncomment this line to actually submit the form
    // $('#rejectionForm').submit();
  });

  $("#flexCheckOthers").on("change", function () {
    const otherTextContainer = $("#otherTextContainer");
    if ($(this).is(":checked")) {
      otherTextContainer.show();
    } else {
      otherTextContainer.hide();
    }
  });
});

function redirectToAssignment() {
  // Redirect to the specified page when confirmed
  window.location.href = "assignment-take-action.php";
}
