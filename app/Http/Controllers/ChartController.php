<?php
namespace App\Http\Controllers;

use App\Charts\TamuBulananChart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $chart = new TamuBulananChart;
        return view('chart', compact('chart'));
    }
}
