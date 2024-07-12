<!DOCTYPE html>
<html>
<head>
    <title>Daily Weather Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #007BFF;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }

        .weather-info {
            margin-top: 20px;
        }

        .weather-info p {
            background: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Weather Report for {{ $city }} today</h1>
        @if ($weatherData)
            <div class="weather-info">
                <p>Temperature: {{ $weatherData['current']['temp_c'] }}°C</p>
                <p>Condition: {{ $weatherData['current']['condition']['text'] }}</p>
                <p>Humidity: {{ $weatherData['current']['humidity'] }}%</p>
                <p>Wind Speed: {{ $weatherData['current']['wind_kph'] }} kph</p>
            </div>
        @else
            <p class="error">Unable to fetch weather data.</p>
        @endif
    </div>
</body>
</html>
