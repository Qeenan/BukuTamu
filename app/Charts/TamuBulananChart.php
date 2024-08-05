<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\User; // Import the User model

class TamuBulananChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        // Fetch data from the database
        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                      ->groupBy('month')
                      ->orderBy('month')
                      ->pluck('count', 'month')
                      ->toArray();

        // Prepare labels and dataset
        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        $labels = [];
        $data = [];
        
        // Ensure all months are present in the labels and data arrays
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = $months[$i];
            $data[] = $users[$i] ?? 0; // Use 0 if no data for the month
        }

        $this->labels($labels)
             ->dataset('Users', 'line', $data)
             ->options([
                'responsive' => true,
                'maintainAspectRatio' => false,
            ]);
    }
}

