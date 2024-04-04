<?php

namespace App\Http\Controllers;

use App\Jobs\IncrementViewCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): \Illuminate\Contracts\Support\Renderable
    {
        parent::index();
        return view('home');
    }
}
