document.getElementById("time").addEventListener("change", function () {
  const timeInput = this.value;
  if (timeInput) {
    const [hours, minutes] = timeInput.split(":").map(Number);
    let totalMinutes = hours * 60 + minutes;

    // Round to the nearest 10 minutes
    const remainder = totalMinutes % 10;
    if (remainder >= 5) {
      totalMinutes += 10 - remainder; // Round up
    } else {
      totalMinutes -= remainder; // Round down
    }

    // Convert back to hours and minutes
    const newHours = Math.floor(totalMinutes / 60)
      .toString()
      .padStart(2, "0");
    const newMinutes = (totalMinutes % 60).toString().padStart(2, "0");

    // Update the input value
    this.value = `${newHours}:${newMinutes}`;
  }
});

document.getElementById("adminID").addEventListener("focus", function () {
  document.getElementById("footnote").style.display = "block"; // Show footnote
});

document.getElementById("adminID").addEventListener("blur", function () {
  document.getElementById("footnote").style.display = "none"; // Hide footnote
});
