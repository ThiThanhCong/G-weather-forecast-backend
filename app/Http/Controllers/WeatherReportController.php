<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherReport;
use Carbon\Carbon;
class WeatherReportController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'city' => 'required|string',
            'temperature' => 'required|numeric',
            'wind_speed' => 'required|numeric',
            'humidity' => 'required|integer',
            'condition_icon' => 'required|string',
            'condition_text' => 'required|string',
        ]);
        $data['report_date'] = Carbon::now()->toDateTimeString();;
        $weatherReport = WeatherReport::create($data);
    
        return response()->json(['message' => 'Weather report saved successfully', 'data' => $weatherReport], 201);
    }
    public function getReportDates()
    {
        $reportDates = WeatherReport::distinct()->pluck('report_date')->toArray();

        return response()->json(['reportDates' => $reportDates], 200);
    }

    public function getWeatherDataByDate($date)
    {
        $weatherData = WeatherReport::where('report_date', $date)->first();

        if (!$weatherData) {
            return response()->json(['message' => 'Weather data not found'], 404);
        }

        return response()->json(['weatherData' => $weatherData], 200);
    }
}
