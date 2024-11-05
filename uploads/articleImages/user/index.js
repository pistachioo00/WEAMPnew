/*  */

function redirectToPage() {
  var selectedOption = document.getElementById("category").value;
  window.location.href = selectedOption;
}
function checkAllFieldsFilled() {
  var categoryValue = document.getElementById("category").value;
  var firstName = document.getElementById("first-name").value;
  var middleName = document.getElementById("middle-name").value;
  var lastName = document.getElementById("last-name").value;
  var middleCheckboxChecked = document.getElementById("middle-check").checked;
  var maleRadioButton = document.getElementById("male-radio").checked;
  var femaleRadioButton = document.getElementById("female-radio").checked;
  var unitBlk = document.getElementById("unit-req").value;
  var empDate = document.getElementById("employment-date").value;
  var natureOfWork = document.getElementById("nature-of-work").value;
  var yearsOfService = document.getElementById("years-of-service").value;
  var cityValueReq = document.getElementById("city-req").value;
  var barangay = document.getElementById("barangay").value;
  var contactNo = document.getElementById("contact").value;
  var email = document.getElementById("email-add").value;
  var bussName = document.getElementById("business-name").value;
  var specificAddRes = document.getElementById("unit-res").value;
  var specificRole = document.getElementById("specific-role").value;
  var barangayRes = document.getElementById("dropdown").value;
  var cityValueRes = document.getElementById("city").value;

  // Check if all fields are filled
  if (
    (categoryValue !== "" &&
      firstName.trim() !== "" &&
      lastName.trim() !== "" &&
      middleCheckboxChecked) ||
    (middleName.trim() !== "" &&
      (maleRadioButton || femaleRadioButton) &&
      empDate !== "" &&
      natureOfWork !== "" &&
      yearsOfService !== "" &&
      unitBlk !== "" &&
      cityValueReq !== "" &&
      barangay !== "" &&
      contactNo !== "" &&
      email !== "" &&
      bussName !== "" &&
      specificAddRes !== "" &&
      specificRole !== "" &&
      barangayRes !== "" &&
      cityValueRes !== "")
  ) {
    // All fields are filled, proceed to another page
    window.location.href = "../user/rfa-form-page2.php";
  } else {
    // Show error indicator
    document.getElementById("indicator-error").innerHTML =
      "Please fill out all the fields.";
    document.getElementById("indicator-error").classList.add("text-danger");
  }
}

function clearForm() {
  // Get all input fields within the form
  var inputs = document.querySelectorAll("input, select");

  // Loop through each input field and clear its value
  inputs.forEach(function (input) {
    // Check if the input field is not disabled
    if (!input.disabled) {
      // Clear the value based on the input type
      switch (input.type) {
        case "text":
          input.value = "";
          break;
        case "select-one":
          // Reset the selected index to deselect any option
          input.selectedIndex = 0; // Set the selected index to the first non-placeholder option
          break;
        case "checkbox":
        case "radio":
          input.checked = false;
          break;
        default:
          break;
      }
    }
  });

  // Clear error message
  document.getElementById("indicator").innerText = "";
}

$(function () {
  // Trigger datetime picker when the image is clicked
  $("#calendarImg").click(function () {
    $("#employment-date").datetimepicker({
      format: "YYYY-MM-DD", // Adjust the format to display only dates
      viewMode: "days", // Display the calendar in days view
      minDate: moment().startOf("day"), // Set the minimum selectable date to today
      maxDate: moment().add(1, "year").endOf("day"), // Set the maximum selectable date to one year from today
      icons: {
        time: "",
        date: "",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: "fa fa-chevron-left",
        next: "fa fa-chevron-right",
        today: "fa fa-screenshot",
        clear: "fa fa-trash",
        close: "fa fa-remove",
      },
    });
    $("#employment-date").datetimepicker("show"); // Show the datetime picker
  });
});

// RFA FORM PAGE2 SCRIPT
// Function to check the number of checked checkboxes
function checkCheckedCheckboxes() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var checkedCount = 0;

  checkboxes.forEach(function (checkbox) {
    if (checkbox.checked) {
      checkedCount++;
    }
  });

  return checkedCount;
}

// Function to validate the checkboxes
// Function to validate the checkboxes
function validateCheckboxes() {
  var claimsIssuesCheckedCount = 0;
  var reliefPrayedForCheckedCount = 0;

  // Count checked checkboxes for Claims / Issues section
  var claimsIssuesCheckboxes = document.querySelectorAll(
    '#claims-and-issues input[type="checkbox"]'
  );
  claimsIssuesCheckboxes.forEach(function (checkbox) {
    if (checkbox.checked) {
      claimsIssuesCheckedCount++;
    }
  });

  // Count checked checkboxes for Relief Prayed For section
  var reliefPrayedForCheckboxes = document.querySelectorAll(
    '#relief-prayed-for input[type="checkbox"]'
  );
  reliefPrayedForCheckboxes.forEach(function (checkbox) {
    if (checkbox.checked) {
      reliefPrayedForCheckedCount++;
    }
  });

  // Check if at least one checkbox is checked in both sections
  if (claimsIssuesCheckedCount === 0 || reliefPrayedForCheckedCount === 0) {
    // Display the indicator if the count is not within the required range
    document.getElementById("indicator").innerText =
      "Please tick at least one checkbox in each section.";
    document.getElementById("indicator").style.display = "block";
    return false;
  } else if (claimsIssuesCheckedCount > 2 || reliefPrayedForCheckedCount > 2) {
    // Display the indicator if the count exceeds the limit
    document.getElementById("indicator").innerText =
      "Please tick a maximum of two checkboxes in each section.";
    document.getElementById("indicator").style.display = "block";
    return false;
  } else {
    // Hide the indicator if the count is within the required range
    document.getElementById("indicator").style.display = "none";
    return true;
  }
}

// Function to handle form submission
function submitForm() {
  if (validateCheckboxes()) {
    // Show the confirmation modal
    $("#confirmationModal").modal("show");
  } else {
    document.getElementById("indicator").style.display = "block";
    document.getElementById("indicator").innerText =
      "Please tick the required checkboxes.";
  }
}

// Function to handle navigation to the next page
function proceedToNextPage() {
  // Proceed to the next page (replace 'nextPage.html' with your desired URL)
  window.location.href = "../user/rfa-sent.php";
}

// Function to handle second confirmation modal
function confirmSubmission() {
  // Proceed to the next page
  proceedToNextPage();
}

// Optional: Add event listeners to checkboxes to trigger validation on change
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
checkboxes.forEach(function (checkbox) {
  checkbox.addEventListener("change", validateCheckboxes);
});

// Function to clear all checkboxes, text areas, and input fields
function clearCheckboxes() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var textareas = document.querySelectorAll("textarea");
  var inputFields = document.querySelectorAll('input[type="text"]');
  var selectElement = document.getElementById("wage");

  checkboxes.forEach(function (checkbox) {
    checkbox.checked = false; // Uncheck each checkbox
  });

  textareas.forEach(function (textarea) {
    textarea.value = ""; // Clear the value of each textarea
  });

  inputFields.forEach(function (input) {
    input.value = ""; // Clear the value of each input field
  });

  // Reset the selected option of the select element
  selectElement.selectedIndex = 0;
}

///////////////////////       GROUP RFA FORM     ///////////////////////////
function isFormFilledRFA() {
  var categoryValue = document.getElementById("category").value;
  var firstName = document.getElementById("first-name").value;
  var lastName = document.getElementById("last-name").value;
  var middleCheckboxChecked = document.getElementById("middle-check").checked;
  var middleName = document.getElementById("middle-name").value;
  var maleRadioButton = document.getElementById("male-radio").checked;
  var femaleRadioButton = document.getElementById("female-radio").checked;
  var unitBlk = document.getElementById("unit").value;
  var empDate = document.getElementById("employment-date").value;
  var natureOfWork = document.getElementById("nature-of-work").value;
  var yearsOfService = document.getElementById("years-of-service").value;
  var cityValueReq = document.getElementById("city-req").value;
  var barangay = document.getElementById("barangay").value;
  var contactNo = document.getElementById("contact").value;
  var email = document.getElementById("email-add").value;
  var bussName = document.getElementById("business-name").value;
  var specificAddRes = document.getElementById("unit-res").value;
  var specificRole = document.getElementById("specific-role").value;
  var barangayRes = document.getElementById("dropdown").value;
  var cityValueRes = document.getElementById("city").value;

  if (
    categoryValue !== "" &&
    firstName.trim() !== "" &&
    lastName.trim() !== "" &&
    middleCheckboxChecked &&
    middleName.trim() !== "" &&
    (maleRadioButton || femaleRadioButton) &&
    empDate !== "" &&
    natureOfWork !== "" &&
    yearsOfService !== "" &&
    unitBlk !== "" &&
    cityValueReq !== "" &&
    barangay !== "" &&
    contactNo !== "" &&
    email !== "" &&
    bussName !== "" &&
    specificAddRes !== "" &&
    specificRole !== "" &&
    barangayRes !== "" &&
    cityValueRes !== ""
  ) {
    // All conditions are met, proceed to the next page
    $("#confirmationModalGroup").modal("hide");
    document.getElementById("indicator-error").style.display = "none";

    // Proceed to the next page (replace 'nextPage.html' with your desired URL)
    window.location.href = "../user/rfa-form-page2.php";
  } else {
    // Display error message if any field is empty
    document.getElementById("indicator-error").style.display = "block";
    document.getElementById("indicator-error").innerText =
      "Please fill out all the fields.";
  }
}

function clearFormGroup() {
  // Get all input fields within the form
  var inputs = document.querySelectorAll("input, select");

  // Loop through each input field and clear its value
  inputs.forEach(function (input) {
    // Check if the input field is not disabled
    if (!input.disabled) {
      // Clear the value based on the input type
      switch (input.type) {
        case "text":
          input.value = "";
          break;
        case "select-one":
          // Reset the selected index to deselect any option
          input.selectedIndex = 0; // Set the selected index to the first non-placeholder option
          break;
        case "checkbox":
        case "radio":
          input.checked = false;
          break;
        default:
          break;
      }
    }
  });

  // Clear error message
  document.getElementById("indicator-error").innerText = "";
}

function toggleMiddleName() {
  var middleNameInput = document.getElementById("middle-name");
  var middleCheck = document.getElementById("middle-check");

  // Toggle the disabled attribute based on the checkbox's checked status
  middleNameInput.disabled = middleCheck.checked;

  // Clear the value of the input field when the checkbox is checked
  if (middleCheck.checked) {
    middleNameInput.value = "";
  }
}
