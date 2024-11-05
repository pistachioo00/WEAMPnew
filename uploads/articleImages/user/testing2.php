<?php
// Database configuration
$servername = "localhost";  // Change this to your server name
$username = "root";         // Change this to your database username
$password = "";             // Change this to your database password
$dbname = "wao";  // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_names = $_POST['product_name'];
    $product_prices = $_POST['product_price'];

    // Check if the arrays are of the same length
    if (count($product_names) == count($product_prices)) {
        echo "<h2>Submitted Product Details:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                </tr>";
        $stmt = $conn->prepare("INSERT INTO testing (name, price) VALUES (?, ?)");
        $stmt->bind_param("sd", $name, $price);

        for ($i = 0; $i < count($product_names); $i++) {
            $name = htmlspecialchars($product_names[$i]);
            $price = htmlspecialchars($product_prices[$i]);
            echo "<tr>
                    <td>{$name}</td>
                    <td>{$price}</td>
                  </tr>";

            // Insert data into database
            $stmt->execute();
        }

        $stmt->close();
        echo "</table>";
    } else {
        echo "There was an error with the form submission. Please ensure all fields are filled out.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
