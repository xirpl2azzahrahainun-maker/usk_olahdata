<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalskema = Skema::count();
        $totalpeserta = Peserta::count();
        return view('dashboard', compact('totalskema', 'totalpeserta'));
    }
}
