<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Backofficedashboard extends Controller
{
    public function index()
    {
        return view('backoffice.dashboard.index');
    }
}