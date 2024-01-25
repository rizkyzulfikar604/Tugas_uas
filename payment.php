<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="payment.css">


<head>
    <style>
        /* Styling for the payment form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function updateBiaya() {
            var motor = document.getElementById("motor").value;
            var biayaElement = document.getElementById("biaya");
            var biaya = 0;

            switch (motor) {
                case "Pcx":
                    biaya = 200000;
                    break;
                case "Nmax":
                    biaya = 200000;
                    break;
                case "Vario":
                    biaya = 150000;
                    break;
                // tambahkan case untuk motor lain jika diperlukan
            }

            biayaElement.innerHTML = "Biaya: Rp " + biaya;
            document.getElementById("biaya_input").value = biaya;
        }
    </script>
</head>

<body>
    <!-- tag form -->
    <form action="Save.php" method="POST">
        <h2>Harga</h2>
        <ul>
            <li>Pcx - Rp 200.000</li>
            <li>Nmax - Rp 200.000</li>
            <li>Vario - Rp 150.000</li>
        </ul>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="no_hp">Phone Number:</label>
        <input type="tel" id="no_hp" name="no_hp" required>

        <label for="bank">Select Your BANK:</label>
        <select id="bank" name="bank" required>
            <option value="BRI">BRI</option>
            <option value="BCA">BCA</option>
            <option value="MANDIRI">MANDIRI</option>
        </select>

        <label for="motor">Select Your Motor:</label>
        <select id="motor" name="motor" onchange="updateBiaya()" required>
            <option value="Pcx">Pcx</option>
            <option value="Nmax">Nmax</option>
            <option value="Vario">Vario</option>
        </select>

        <label for="jmlh_hari">Jumlah Hari:</label>
        <input type="number" id="jmlh_hari" name="jmlh_hari" min="1" max="10" required>

    

        <button type="submit">Order now</button>
    </form>
</body>

</html>
