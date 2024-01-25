<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Motor Rental</title>
</head>
<body>

    <header>
        <h1>Motor Rental</h1>
    </header>

    <main>
        <section id="motor-list">
            <?php
            $motorData = [
                ['brand' => 'Honda', 'model' => 'Pcx', 'price' => 200000, 'image' => 'pcx.png'],
                ['brand' => 'Yamaha', 'model' => 'Nmax', 'price' => 200000, 'image' => 'Nmax.png'],
                ['brand' => 'Honda', 'model' => 'Vario ZX-10R', 'price' => 150000, 'image' => 'vario.png'],
            ];

            foreach ($motorData as $motor) {
                echo '<div class="motor-card">';
                echo '<div class="motor-image">';
                echo '<img src="' . $motor['image'] . '" alt="' . $motor['brand'] . ' ' . $motor['model'] . '">';
                echo '</div>';
                echo '<div class="motor-details">';
                echo '<h2>' . $motor['brand'] . ' ' . $motor['model'] . '</h2>';
                echo '<p class="price">' . $motor['price'] . '</p>';
                echo '</div>';
                echo '<div class="button-container">';
                echo '<form action="payment.php" method="post">';
                echo '<input type="hidden" name="motor_brand" value="' . $motor['brand'] . '">';
                echo '<input type="hidden" name="motor_model" value="' . $motor['model'] . '">';
                echo '<input type="hidden" name="motor_price" value="' . $motor['price'] . '">';
                echo '<button type="submit" name="beli">Sewa</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Motor Rental</p>
    </footer>
</body>
</html>
