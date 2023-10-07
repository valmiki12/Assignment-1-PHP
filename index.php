<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="Pizza Order Form">

    <title>Pizza Order</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Pizza Order Form</h1>
    </header>

    <div class="container">
        <form id="pizzaOrderForm">
            <label for="pizzaType">Pizza Type:</label>
            <select id="pizzaType" name="pizzaType" required>
                <option value="margherita">Margherita</option>
                <option value="pepperoni">Pepperoni</option>
                <option value="vegetarian">Vegetarian</option>
            </select>

            <label for="pizzaSize">Pizza Size:</label>
            <select id="pizzaSize" name="pizzaSize" required>
                <option value="small">Small</option>
                <option value="medium">Medium</option>
                <option value="large">Large</option>
            </select>

            <label>Toppings:</label>
            <input type="checkbox" id="cheese" name="toppings[]" value="cheese">
            <label for="cheese">Cheese</label>

            <input type="checkbox" id="mushrooms" name="toppings[]" value="mushrooms">
            <label for="mushrooms">Mushrooms</label>

            <input type="checkbox" id="olives" name="toppings[]" value="olives">
            <label for="olives">Olives</label>

            <input type="checkbox" id="onions" name="toppings[]" value="onions">
            <label for="onions">Onions</label>

            <label for="deliveryAddress">Delivery Address:</label>
            <textarea id="deliveryAddress" name="deliveryAddress" placeholder="Enter delivery address" required></textarea>

            <button name="submit" type="submit">Place Order</button>
        </form>
    <div class="form-group submit-message">
            <?php
            require_once ('database.php');
            if(isset($_POST) & !empty($_POST)){
                $pizzaType = $database->sanitize($_POST['pizzaType']);
                $pizzaSize = $database->sanitize($_POST['pizzaSize']);
                $toppings[] = $database->sanitize($_POST['toppings[]']);
                $deliveryAddress = $database->sanitize($_POST['deliveryAddress']);
                $res = $database->create($pizzaType,$pizzaSize,$toppings[],$deliveryAddress);
                if ($res) {
                    echo "<p>Record Created</p>";
                }else{
                    echo "<p>Could not Create record </p>";
                }
            }
            ?>
        </div>
</body>

</html>
