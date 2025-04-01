<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>🌤 Weather App</h2>
        <form method="POST">
            <select name="city" id="city">
                <option value="Casablanca" <?php if (isset($_POST['city']) && $_POST['city'] == "Casablanca") echo 'selected'; ?>>Casablanca</option>
                <option value="Rabat" <?php if (isset($_POST['city']) && $_POST['city'] == "Rabat") echo 'selected'; ?>>Rabat</option>
                <option value="Marrakech" <?php if (isset($_POST['city']) && $_POST['city'] == "Marrakech") echo 'selected'; ?>>Marrakech</option>
                <option value="Fes" <?php if (isset($_POST['city']) && $_POST['city'] == "Fes") echo 'selected'; ?>>Fes</option>
                <option value="Tangier" <?php if (isset($_POST['city']) && $_POST['city'] == "Tangier") echo 'selected'; ?>>Tangier</option>
                <option value="Agadir" <?php if (isset($_POST['city']) && $_POST['city'] == "Agadir") echo 'selected'; ?>>Agadir</option>
                <option value="Meknes" <?php if (isset($_POST['city']) && $_POST['city'] == "Meknes") echo 'selected'; ?>>Meknes</option>
                <option value="Tanger" <?php if (isset($_POST['city']) && $_POST['city'] == "Tanger") echo 'selected'; ?>>Tanger</option>
                <option value="Oujda" <?php if (isset($_POST['city']) && $_POST['city'] == "Oujda") echo 'selected'; ?>>Oujda</option>
                <option value="Safi" <?php if (isset($_POST['city']) && $_POST['city'] == "Safi") echo 'selected'; ?>>Safi</option>
                <option value="Kenitra" <?php if (isset($_POST['city']) && $_POST['city'] == "Kenitra") echo 'selected'; ?>>Kenitra</option>
                <option value="El-Jadida" <?php if (isset($_POST['city']) && $_POST['city'] == "El-Jadida") echo 'selected'; ?>>El Jadida</option>
                <option value="Nador" <?php if (isset($_POST['city']) && $_POST['city'] == "Nador") echo 'selected'; ?>>Nador</option>
                <option value="Tetouan" <?php if (isset($_POST['city']) && $_POST['city'] == "Tetouan") echo 'selected'; ?>>Tetouan</option>

            </select>
            <button type="submit" name="weather">Get Weather</button>
        </form>

        <div class="weather-card">
            <?php
            if (isset($_POST['weather'])) {
                $city = $_POST['city'];
                $apiKey = '708d6ad0cc98e209e17f61a99ae977c7';
                $url = "https://api.openweathermap.org/data/2.5/weather?q=$city,MA&appid=$apiKey&units=metric";
                $request = curl_init();
                curl_setopt($request, CURLOPT_URL, $url);
                curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($request);
                curl_close($request);

                if ($response) {
                    $data = json_decode($response, true);
                    $temp = $data['main']['temp'];
                    $description = $data['weather'][0]['description'];
                    if (isset($temp)) {
                        echo  "<h3 id='city-name'>$city</h3>";
                        echo "<h1 id='temperature'>$temp °C</h1>";
                        echo "<p id='description'>$description</p>";
                    } else {
                        echo '<h3 id="city-name">Something is wrong while getting data</h3>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <footer>
        <p>Created by Ilyass Ihassane</p>
    </footer>
</body>

</html>