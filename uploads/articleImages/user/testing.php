<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multiple Input Form</title>
</head>
<body>
    <h2>Enter Product Details</h2>
    <form action="testing2.php" method="post">
        <div id="product-container">
            <div class="product">
                <label>Product Name:</label>
                <input type="text" name="product_name[]" required>
                <label>Price:</label>
                <input type="text" name="product_price[]" required>
            </div>
        </div>
        <button type="button" onclick="addProduct()">Add Another Product</button>
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <script>
        function addProduct() {
            var container = document.getElementById('product-container');
            var newProduct = document.createElement('div');
            newProduct.className = 'product';
            newProduct.innerHTML = `
                <label>Product Name:</label>
                <input type="text" name="product_name[]" required>
                <label>Price:</label>
                <input type="text" name="product_price[]" required>
            `;
            container.appendChild(newProduct);
        }
    </script>
</body>
</html>
