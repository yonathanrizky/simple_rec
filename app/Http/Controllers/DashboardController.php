<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Vacancy::find(9);
        return view('dashboard.index', compact('data'));
    }
}
