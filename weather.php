<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weather app</title>
    <style>
        /* General Styling */
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #2b5876, #4e4376);
    color: white;
    text-align: center;
    padding: 20px;
}

/* Form Styling */
form {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 10px;
    display: inline-block;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

h3 {
    margin-bottom: 15px;
}

select, button {
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    margin: 10px;
}

select {
    background: #fff;
    color: #333;
    cursor: pointer;
}

button {
    background: #ff9800;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #e68900;
}

/* Weather Display */
div.weather-info {
    margin-top: 20px;
    padding: 20px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    display: inline-block;
    font-size: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.weather-info span {
    font-weight: bold;
    color: #ffcc00;
}

    </style>
</head>

<body>
    <form method="POST">
        <h3>Choose the city to get weather</h3>
        <select name="city" id="">
            <option value="Casablanca">Casa</option>
            <option value="Rabat">Rabat</option>
        </select>
        <button type="submit" name="ok">get weather</button>
    </form>

    <div >
        <?php
        if (isset($_POST['ok'])) {
            $city = $_POST['city'];
            $apiKey = '708d6ad0cc98e209e17f61a99ae977c7';
            $url = "https://api.openweathermap.org/data/2.5/weather?q=$city,MA&appid=$apiKey&units=metric";

            $req = curl_init();
            curl_setopt($req, CURLOPT_URL, $url);
            curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($req);
            curl_close($req);

            if ($res) {
                $data = json_decode($res, true);

                if (isset($data['main']['temp'])) {
                    $tmp = $data['main']['temp'];
                    $des = $data['weather'][0]['description'];

                    echo "the temp in your $city is $tmp and its $des";
                }
                else {
                    echo "something is wrong while getting data";
                }
            }
        
        } 
        ?>
    </div>
</body>

</html>